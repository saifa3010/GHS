document.querySelector("#btn1").addEventListener("click", function () {
    var popup_category = document.querySelector(".popup_category1");
    popup_category.classList.add("active");

    var modal = document.getElementById('myModal1');
    modal.style.display = "block";
});

document.querySelector(".popup_category1 .close-btn").addEventListener("click", function () {
    var popup_category = document.querySelector(".popup_category1");
    popup_category.classList.remove("active");

    var modal = document.getElementById('myModal1');
    modal.style.display = "none";
});