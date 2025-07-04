import unittest
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
import time

class BaseTest(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        cls.driver = webdriver.Chrome()
        cls.driver.implicitly_wait(10)
        cls.base_url = "http://localhost:8000"

    @classmethod
    def tearDownClass(cls):
        cls.driver.quit()

    def login(self, username, password):
        self.driver.get(f"{self.base_url}/login")
        self.driver.find_element(By.NAME, "username").send_keys(username)
        self.driver.find_element(By.NAME, "password").send_keys(password)
        self.driver.find_element(By.XPATH, "//button[@type='submit']").click()
        time.sleep(1)

# 1. ADMIN MODULE
class TestAdminMenuManagement(BaseTest):
    def test_FR_ADM_001_create_menu_item(self):
        self.login("admin", "Admin!@123")
        self.driver.get(f"{self.base_url}/admin/menu/create")
        self.driver.find_element(By.NAME, "nama").send_keys("Test Menu")
        self.driver.find_element(By.NAME, "harga").send_keys("10000")
        self.driver.find_element(By.NAME, "deskripsi_menu").send_keys("Deskripsi test menu")
        #upload gambar jika ada input file
        self.driver.find_element(By.NAME, "gambar_menu").send_keys("/assets/img/menu/image.jpg")
        self.driver.find_element(By.XPATH, "//button[contains(text(),'Simpan')]").click()
        self.assertIn("berhasil", self.driver.page_source.lower())

    def test_FR_ADM_002_modify_menu_item(self):
        self.login("admin", "Admin!@123")
        self.driver.get(f"{self.base_url}/admin/menu")
        self.driver.find_element(By.XPATH, "//a[contains(text(),'Edit')]").click()
        self.driver.find_element(By.NAME, "nama").clear()
        self.driver.find_element(By.NAME, "nama").send_keys("Menu Diubah")
        self.driver.find_element(By.XPATH, "//button[contains(text(),'Simpan')]").click()
        self.assertIn("berhasil", self.driver.page_source.lower())

    def test_FR_ADM_003_remove_menu_item(self):
        self.login("admin", "Admin!@123")
        self.driver.get(f"{self.base_url}/admin/menu")
        self.driver.find_element(By.XPATH, "//a[contains(text(),'Hapus')]").click()
        self.driver.switch_to.alert.accept()
        self.assertIn("berhasil", self.driver.page_source.lower())

# 2. USER MODULE
class TestUserAuthentication(BaseTest):
    def test_FR_USR_001_user_registration(self):
        self.driver.get(f"{self.base_url}/register")
        self.driver.find_element(By.NAME, "name").send_keys("User Selenium")
        self.driver.find_element(By.NAME, "username").send_keys("user_selenium")
        self.driver.find_element(By.NAME, "email").send_keys("user_selenium@example.com")
        self.driver.find_element(By.NAME, "password").send_keys("Password123")
        self.driver.find_element(By.NAME, "password_confirmation").send_keys("Password123")
        self.driver.find_element(By.XPATH, "//button[@type='submit']").click()
        self.assertIn("berhasil", self.driver.page_source.lower())

    def test_FR_USR_002_user_authentication(self):
        self.login("user_selenium", "Password123")
        self.assertIn("logout", self.driver.page_source.lower())

    def test_FR_USR_005_profile_management(self):
        self.login("user_selenium", "Password123")
        self.driver.get(f"{self.base_url}/user/profile")
        self.driver.find_element(By.XPATH, "//a[contains(text(),'Edit')]").click()
        self.driver.find_element(By.NAME, "name").clear()
        self.driver.find_element(By.NAME, "name").send_keys("User Selenium Edit")
        self.driver.find_element(By.XPATH, "//button[contains(text(),'Simpan')]").click()
        self.assertIn("berhasil", self.driver.page_source.lower())

class TestUserMenuDiscovery(BaseTest):
    def test_FR_USR_006_menu_catalog(self):
        self.driver.get(f"{self.base_url}/menu")
        self.assertIn("menu", self.driver.page_source.lower())
        # cek pagination
        self.assertTrue(self.driver.find_elements(By.CLASS_NAME, "pagination"))

    def test_FR_USR_007_advanced_search(self):
        self.driver.get(f"{self.base_url}/menu")
        self.driver.find_element(By.NAME, "search").send_keys("ayam")
        self.driver.find_element(By.XPATH, "//button[contains(text(),'Cari')]").click()
        self.assertIn("ayam", self.driver.page_source.lower())

class TestUserOrderProcessing(BaseTest):
    def test_FR_USR_010_shopping_cart(self):
        self.login("user_selenium", "Password123")
        self.driver.get(f"{self.base_url}/menu")
        self.driver.find_element(By.XPATH, "//button[contains(@class,'add-to-cart')]").click()
        self.driver.get(f"{self.base_url}/user/keranjang")
        self.assertIn("keranjang", self.driver.page_source.lower())

    def test_FR_USR_012_order_confirmation(self):
        self.login("user_selenium", "Password123")
        self.driver.get(f"{self.base_url}/user/keranjang")
        self.driver.find_element(By.XPATH, "//button[contains(text(),'Checkout')]").click()
        self.assertIn("metode pembayaran", self.driver.page_source.lower())

class TestUserPaymentProcessing(BaseTest):
    def test_FR_USR_013_payment_method_selection(self):
        self.login("user_selenium", "Password123")
        self.driver.get(f"{self.base_url}/user/metode")
        self.assertIn("pembayaran", self.driver.page_source.lower())

# 3. COURIER MODULE
class TestCourierProfileManagement(BaseTest):
    def test_FR_CRR_001_courier_authentication(self):
        self.login("kurir", "kurirpassword")
        self.assertIn("dashboard", self.driver.page_source.lower())

    def test_FR_CRR_003_profile_update(self):
        self.login("kurir", "kurirpassword")
        self.driver.get(f"{self.base_url}/kurir/profile")
        self.driver.find_element(By.XPATH, "//a[contains(text(),'Edit')]").click()
        self.driver.find_element(By.NAME, "name").clear()
        self.driver.find_element(By.NAME, "name").send_keys("Kurir Selenium")
        self.driver.find_element(By.XPATH, "//button[contains(text(),'Simpan')]").click()
        self.assertIn("berhasil", self.driver.page_source.lower())

if __name__ == "__main__":
    unittest.main()