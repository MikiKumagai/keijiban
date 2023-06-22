
function input(id) {
  div = document.getElementById(id);
  textArea = div.children[0];
  length = div.children[1].children[0];
  const maxLength = 200;
  length.textContent = maxLength - textArea.value.length;
  if (maxLength - textArea.value.length < 0) {
    length.style.color = 'red';
  } else {
    length.style.color = '#444';
  }
}