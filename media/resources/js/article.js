let subtitle_block = $('#subtitle_block');
for (let i = 1; i <= $('.subtitle').length; i++) {
  subtitle_block.append($('<p class="mokuji_content"><a href="#subtitle' + i + '">・' + $("#subtitle" + i).text() + "</a></p>"));
}


$('.mokuji_content').mouseover(function () {
  $(this).attr('class', 'chage_color');
}).mouseout(function () {
  $(this).attr('class', '');
});
