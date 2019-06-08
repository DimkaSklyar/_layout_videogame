function AjaxFormRequest(result_id, formMain, url) {
  jQuery.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: jQuery("#" + formMain).serialize(),
    success: function (response) {
      $(':input', '#' + formMain)
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .removeAttr('checked')
        .removeAttr('selected');
      setTimeout(() => {
        $("#message").hide();
      }, 5000);
    },
    error: function (response) {
      var par = document.getElementById(result_id);
      var error = document.createElement('p');
      error.classList.add("mt-3");
      error.innerHTML = "Возникла ошибка при отправке формы.";
      par.appendChild(error);
      setTimeout(func, 700);
    }
  });
}
function func() {
  $("p.mt-3").detach();
}
$('#subscribe-form').submit(function (e) {
  e.preventDefault();
  AjaxFormRequest('messegeResult-feedback', 'subscribe-form', './subscribe.php');
});



$(function () {
  $('.smart-basket__wrapper').smbasket({
    productElement: 'product__element',
    buttonAddToBasket: 'product__add-to-cart-button',
    countryCode: '+7',
    smartBasketCurrency: '₽',
    smartBasketMinArea: 'cart',
    smartBasketMinIconPath: 'img/shopping-cart.svg',
  });
});

$(".rdr").click(function (e) {
  e.preventDefault();
  $("#rdr").trigger('click');
});

$(".metro").click(function (e) {
  e.preventDefault();
  $("#metro").trigger('click');
});

$(".kid").click(function (e) {
  e.preventDefault();
  $("#kid").trigger('click');
});

$(".bf").click(function (e) {
  e.preventDefault();
  $("#bf").trigger('click');
});

$(".fifa").click(function (e) {
  e.preventDefault();
  $("#fifa").trigger('click');
});

$(".ge3").click(function (e) {
  e.preventDefault();
  $("#ge3").trigger('click');
});

function del_spaces(str) {
  str = str.replace(/\s/g, '');
  return str;
}


$("a[href='#small-dialog']").click(function () {
  $("#price").text($(this).closest(".product-item").find(".price").text());
  $("#product-img").attr("src", $(this).closest(".product-item").find("img").attr("src"));
  $("#product-name").text($(this).closest(".product-item").find("h3").text());
  $("#description").html($(this).closest(".product-item").find(".description").html())
  $("#inputCar").val($("#product-name").text());

  $(".product__add-to-cart-button").attr("data-sb-id-or-vendor-code", $(this).closest(".product-item").find(".article").text())
  $(".product__add-to-cart-button").attr("data-sb-product-name", $(this).closest(".product-item").find("h3").text());

  var str = $("#price").text().substring(0, $("#price").text().length - 4);
  str = del_spaces(str);
  $(".product__add-to-cart-button").attr("data-sb-product-price", str);
  $(".product__add-to-cart-button").attr("data-sb-product-img", $("#product-img").attr("src"));
});


$(document).ready(function () {


  $('.popup-with-zoom-anim').magnificPopup({
    type: 'inline',

    fixedContentPos: false,
    fixedBgPos: true,

    overflowY: 'auto',

    closeBtnInside: true,
    preloader: false,

    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  });


  $('.my-slider').slick({
    useTransform: true,
    cssEase: 'cubic-bezier(0.22, 0.61, 0.36, 1)',
    fade: true,
    arrows: true
  });

  $('.carousel').slick({
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 2,
    arrows: false,
    infinite: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  $(".category-href").click(function () {
    var getValue = $(this).attr('id');
    // console.log(getValue);
    localStorage.setItem('button', getValue);
  });
  var mixer = mixitup('.mixitup');

  var buttonNameClick = localStorage.getItem('button');

  var a = $('.catalog-category');

  for (let i = 0; i < a.length; i++) {
    if ($(a[i]).data('filter').substring(1) == buttonNameClick) {
      $(a[i]).trigger('click');
      console.log(localStorage.getItem('button'));
    }
  }


});

