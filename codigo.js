const toggleSwitch = document.querySelector(
  '.theme-switch input[type="checkbox"]'
);
const currentTheme = localStorage.getItem("theme");

if (currentTheme) {
  document.documentElement.setAttribute("data-theme", currentTheme);

  if (currentTheme === "dark") {
    toggleSwitch.checked = true;
    console.log("guardado")
  }
}

function switchTheme(e) {
  if (e.target.checked) {
        document.documentElement.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark");
        console.log("dark");
  } else {
        document.documentElement.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light");
        console.log("light");
  }
}

toggleSwitch.addEventListener("change", switchTheme, false);

$("#formLogin").submit(function (e) {
  e.preventDefault();
  var usuario = $.trim($("#usuario").val());
  var password = $.trim($("#password").val());

  if (usuario.length == "" || password == "") {
    Swal.fire({
      type: "warning",
      title: "Debe ingresar un usuario y/o password",
    });
    return false;
  } else {
    $.ajax({
      url: "bd/login.php",
      type: "POST",
      datatype: "json",
      data: { usuario: usuario, password: password },
      success: function (data) {
        if (data == "null") {
          Swal.fire({
            type: "error",
            title: "Usuario y/o password incorrecta",
          });
        } else {
          Swal.fire({
            type: "success",
            title: "¡Bienvenido!",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ingresar",
          }).then((result) => {
            if (result.value) {
              window.location.href = "dashboard/index.php";
            }
          });
        }
      },
    });
  }
});
