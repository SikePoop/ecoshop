const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    }
    )
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    }
    )
}

$(document).ready(function() {
    $('.dropright button').on("click", function(e) {
      e.stopPropagation();
      e.preventDefault();
  
      if (!$(this).next('div').hasClass('show')) {
        $(this).next('div').addClass('show');
      } else {
        $(this).next('div').removeClass('show');
      }
  
    });
  });