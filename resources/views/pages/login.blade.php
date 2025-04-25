<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <title>Login & Register</title>
  <style>
    .nav-link:hover {
      background-color: gold;
      color: white !important;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <!-- Container wrapper -->
  <div class="w-80 rounded-lg shadow h-auto p-6 bg-white relative overflow-hidden">
    
    <!-- LOGIN FORM -->
    <div id="loginForm">
      <div class="flex flex-col justify-center items-center space-y-2">
        <h2 class="text-2xl font-medium text-slate-700">Login</h2>
        <p class="text-slate-500">Enter details below.</p>
      </div>
      <form class="w-full mt-4 space-y-3">
        <div>
          <input class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-blue-300"
            placeholder="Username" id="username" name="username" type="text" />
        </div>
        <div>
          <input class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-blue-300"
            placeholder="Password" id="password" name="password" type="password" />
        </div>
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input class="mr-2 w-4 h-4" id="remember" name="remember" type="checkbox" />
            <span class="text-slate-500">Remember me </span>
          </div>
          <a class="text-blue-500 font-medium hover:underline" href="#">Forgot Password</a>
        </div>
        <button
          class="w-full justify-center py-1 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 rounded-md text-white ring-2"
          id="login" name="login" type="submit">
          Login
        </button>
        <p class="flex justify-center space-x-1">
          <span class="text-slate-700">Don't have an account?</span>
          <a class="text-blue-500 hover:underline cursor-pointer" onclick="toggleForms()">Sign Up</a>
        </p>
      </form>
    </div>

    <!-- REGISTER FORM -->
    <div id="registerForm" class="hidden">
      <div class="flex flex-col justify-center items-center space-y-2">
        <h2 class="text-2xl font-medium text-slate-700">Register</h2>
        <p class="text-slate-500">Create your account below.</p>
      </div>
      <form class="w-full mt-4 space-y-4">
        <div>
          <input class="outline-none border-2 border-slate-300 rounded-md px-3 py-2 text-slate-700 w-full focus:border-green-400"
            placeholder="Full Name" id="name" name="name" type="text" required />
        </div>
        <div>
          <input class="outline-none border-2 border-slate-300 rounded-md px-3 py-2 text-slate-700 w-full focus:border-green-400"
            placeholder="Username" id="reg-username" name="reg-username" type="text" required />
        </div>
        <div>
          <input class="outline-none border-2 border-slate-300 rounded-md px-3 py-2 text-slate-700 w-full focus:border-green-400"
            placeholder="Email" id="email" name="email" type="email" required />
        </div>
        <div>
          <input class="outline-none border-2 border-slate-300 rounded-md px-3 py-2 text-slate-700 w-full focus:border-green-400"
            placeholder="Password" id="reg-password" name="reg-password" type="password" required />
        </div>
        <div>
          <input class="outline-none border-2 border-slate-300 rounded-md px-3 py-2 text-slate-700 w-full focus:border-green-400"
            placeholder="Confirm Password" id="confirm-password" name="confirm-password" type="password" required />
        </div>
        <button
          class="w-full py-2 bg-green-500 hover:bg-green-600 active:bg-green-700 rounded-md text-white font-semibold transition"
          id="register" name="register" type="submit">
          Register
        </button>
        <p class="text-center text-slate-700">
          Already have an account?
          <a class="text-blue-500 hover:underline cursor-pointer" onclick="toggleForms()">Login</a>
        </p>
      </form>
    </div>

  </div>

  <!-- Toggle Script -->
  <script>
    function toggleForms() {
      document.getElementById("loginForm").classList.toggle("hidden");
      document.getElementById("registerForm").classList.toggle("hidden");
    }
  </script>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
