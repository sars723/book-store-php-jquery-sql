let id = $("input[name*='book_id']");
id.attr('readonly', 'readonly');

$('.btn-edit').click((e) => {
  let textValues = displayData(e);
  //console.log(textValues);
  $input = $('form input');
  let id = $("input[name*='book_id']");
  let bookName = $("input[name*='book_name']");
  let bookPublisher = $("input[name*='book_publisher']");
  let bookPrice = $("input[name*='book_price']");

  bookName.val(textValues[1]);
  bookPublisher.val(textValues[2]);
  bookPrice.val(textValues[3].replace('$', ''));
});
const displayData = (e) => {
  let id = 0;
  const td = $('#tbody tr td');
  let textValues = [];
  for (const value of td) {
    //console.log(value);
    if (value.dataset.id == e.target.dataset.id) {
      //console.log(e.target, e.target.dataset.id);
      //console.log(value);
      textValues[id++] = value.textContent;
    }
  }
  return textValues;
};
