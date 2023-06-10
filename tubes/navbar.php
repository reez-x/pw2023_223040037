<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
  <link rel="stylesheet" href="css/navbar.css" />
  <title>Dropdown Menu</title>
  <style>
    /* Additional CSS styles */
    .profile-dropdown {
      position: relative;
    }

    .dropdown-menu-profile {
      display: none;
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      background-color: var(--color-black);
      padding: 10px;
      width: 150px;
      text-align: left;
    }

    .show {
      display: block;
    }

    .dropdown-menu-profile ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .dropdown-menu-profile ul li {
      padding: 5px 0;
    }

    .dropdown-menu-profile ul li a {
      color: var(--color-white);
      text-decoration: none;
      display: block;
    }
  </style>
</head>
<body>
  <div class="menu-bar">
    <h1 class="logo">Pemerintah<span>Kita.</span></h1>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="#">Pages <i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Portfolio</a></li>
            <li>
              <a href="#">Team <i class="fas fa-caret-right"></i></a>
              <div class="dropdown-menu-1">
                <ul>
                  <li><a href="#">Team-1</a></li>
                  <li><a href="#">Team-2</a></li>
                  <li><a href="#">Team-3</a></li>
                  <li><a href="#">Team-4</a></li>
                </ul>
              </div>
            </li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>
      </li>
      <li><a href="lapor.php">Lapor</a></li>
      <li class="profile-dropdown">
        <img src="img/navbar/default-profile.jpg" class="profile" alt="Profile">
        <div class="dropdown-menu-profile">
          <ul>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>

  <script>
    // Add event listener to show/hide the profile dropdown menu
    const profileDropdown = document.querySelector('.profile-dropdown');
    const dropdownMenuProfile = profileDropdown.querySelector('.dropdown-menu-profile');

    profileDropdown.addEventListener('click', function() {
      dropdownMenuProfile.classList.toggle('show');
    });

    
  </script>
</body>
</html>
