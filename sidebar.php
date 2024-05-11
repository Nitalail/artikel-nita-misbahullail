<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar Menu</title>

  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100%;
      background: #fff;
    }

    nav {
      position: fixed;
      top: 0;
      left: 0;
      height: 70px;
      width: 100%;
      display: flex;
      align-items: center;
      background: #fff;
      box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
    }

    nav .logo {
      display: flex;
      align-items: center;
      margin: 0 24px;
    }

    .logo .menu-icon {
      color: #FF0000;
      font-size: 24px;
      margin-right: 14px;
      cursor: pointer;
    }

    .logo .logo-name {
      color: #333;
      font-size: 22px;
      font-weight: 500;
    }

    nav .sidebar {
      position: fixed;
      top: 0;
      left: -100%;
      height: 100%;
      width: 260px;
      padding: 20px 0;
      background-color: #fff;
      box-shadow: 0 5px 1px rgba(0, 0, 0, 0.1);
      transition: all 0.4s ease;
    }

    nav.open .sidebar {
      left: 0;
    }

    .sidebar .sidebar-content {
      display: flex;
      height: 100%;
      flex-direction: column;
      justify-content: space-between;
      padding: 30px 16px;
    }

    .sidebar-content .list {
      list-style: none;
    }

    .list .nav-link {
      display: flex;
      align-items: center;
      margin: 8px 0;
      padding: 14px 12px;
      border-radius: 8px;
      text-decoration: none;
    }

    .lists .nav-link:hover {
      background-color: #FF0000;
    }

    .nav-link .icon {
      margin-right: 14px;
      font-size: 20px;
      color: #707070;
    }

    .nav-link .link {
      font-size: 16px;
      color: #707070;
      font-weight: 400;
    }

    .lists .nav-link:hover .icon,
    .lists .nav-link:hover .link {
      color: #fff;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: -100%;
      height: 1000vh;
      width: 200%;
      opacity: 0;
      pointer-events: none;
      transition: all 0.4s ease;
      background: rgba(0, 0, 0, 0.3);
    }

    nav.open~.overlay {
      opacity: 1;
      left: 260px;
      pointer-events: auto;
    }
    .main-content {
      transition: margin-left 0.4s ease;
      margin-left: 0; 
      padding-top: 80px; /* Tambahkan padding atas sesuai dengan tinggi navbar */
    }

    nav.open~.main-content {
      margin-left: 260px;
    }
    .submenu {
  display: none;
  padding-left: 20px;
}

.list:hover .submenu {
  display: block;
}

.submenu li {
  margin: 5px 0;
}

.submenu li a {
  display: inline-block;
  color: #707070;
  font-size: 14px;
  text-decoration: none;
  transition: color 0.3s ease;
}

.submenu li a:hover {
  color:  #FF0000;
}

.submenu.center {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
}
.social-icons {
  display: flex; 
  justify-content: flex-start; 
  margin-top: 20px; 
}


  </style>
</head>

<body>
  <nav>
    <div class="logo">
      <i class="bx bx-menu menu-icon"></i>
      <span class="logo-name"></span>
    </div>

    <div class="sidebar">
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Ntaa</span>
      </div>

      <div class="sidebar-content">
        <ul class="lists">
        <li class="list">
    <a href="index.php" class="nav-link">
    <i class='bx bxs-data icon'></i>
        <span class="link">Data Artikel</span>
    </a>
</li>

          <li class="list">
            <a href="articles.php" class="nav-link">
            <i class='bx bx-news icon'></i>
              <span class="link">artikel</span>
            </a>
          </li>
          <li class="list">
    <a href="subkategori.php?kategori=Teknologi" class="nav-link">
    <i class='bx bx-list-check icon'></i>
        <span class="link">Kategori</span>
    </a>
    <ul class="submenu">
  <li><a href="subkategori.php?kategori=Teknologi"><i class='bx bx-chalkboard icon' ></i> Teknologi</a></li>
  <li><a href="subkategori.php?kategori=Kesehatan"><i class='bx bxs-heart icon'></i> Kesehatan</a></li>
  <li><a href="subkategori.php?kategori=Pendidikan"><i class='bx bxs-book icon'></i> Pendidikan</a></li>
  <li><a href="subkategori.php?kategori=Hiburan"><i class='bx bxs-game icon'></i> Hiburan</a></li>
  <li><a href="subkategori.php?kategori=Olahraga"><i class='bx bx-football icon' ></i> Olahraga</a></li>
</ul>

</li>

      </div>
    </div>
  </nav>

  <section class="overlay"></section>
  <div class="main-content">
    <!-- Konten utama dari halaman -->
  </div>

  <script>
    const navBar = document.querySelector("nav"),
      menuBtns = document.querySelectorAll(".menu-icon"),
      overlay = document.querySelector(".overlay"),
      mainContent = document.querySelector(".main-content");

    menuBtns.forEach((menuBtn) => {
      menuBtn.addEventListener("click", () => {
        navBar.classList.toggle("open");
        mainContent.style.marginLeft = navBar.classList.contains("open") ? "260px" : "0";
      });
    });

    overlay.addEventListener("click", () => {
      navBar.classList.remove("open");
      mainContent.style.marginLeft = "0";
    });

    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
      link.addEventListener("click", () => {
        const title = link.querySelector(".link").textContent;
        document.querySelector(".logo-name").textContent = title;
      });
    });
  </script>
</body>

</html>
