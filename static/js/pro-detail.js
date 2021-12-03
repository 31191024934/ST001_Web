// minus plus button
var value = document.querySelector('.input-quantity').value;
const inputQuantity = document.querySelector('.input-quantity')
const minus = document.querySelector('.minus');
const plus = document.querySelector('.plus');

minus.addEventListener('click', function(){
    if (value > 1){
        value = parseInt(value) - 1;
    }
    inputQuantity.value = value;
})

plus.addEventListener('click', function(){
    if (value >= 1){
        value = parseInt(value) + 1;
    }
    inputQuantity.value = value;
})

$(".product-carousel-item-container")
  // tile mouse actions
  .on("click", function() {
    $(this)
      .children(".product-carousel-item")
      .css({ transform: "scale(" + $(this).attr("data-scale") + ")" });
  })
  .on("mouseout", function() {
    $(this)
      .children(".product-carousel-item")
      .css({ transform: "scale(1)" });
  })
  .on("mousemove", function(e) {
    $(this)
      .children(".product-carousel-item")
      .css({
        "transform-origin":
          ((e.pageX - $(this).offset().left) / $(this).width()) * 100 +
          "% " +
          ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +
          "%"
      });
  });
