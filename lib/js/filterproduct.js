let viewMoreBtn = document.querySelectorAll('.fa-solid.fa-plus');
let viewMoreSection = document.querySelectorAll('.sub-sub-dropdown');

let i = 0, j = 0;


viewMoreBtn.forEach(element => {
     element.addEventListener('click', function (evt) {
          if (evt.target.className == "fa-solid fa-plus") {
               evt.target.className = "fa-solid fa-minus";
               for (i = 0; i < viewMoreBtn.length; i++) {
                    if (viewMoreBtn[i].className.match("fa-minus")) {
                         j = i;
                         viewMoreSection[j].style.display = 'block';
                    }
               }
          }
          else {
               evt.target.className = "fa-solid fa-plus";
               for (i = 0; i < viewMoreBtn.length; i++) {
                    if (viewMoreBtn[i].className.match("fa-plus")) {
                         j = i;
                         viewMoreSection[j].style.display = 'none';
                    }
               }
          }
     });
});