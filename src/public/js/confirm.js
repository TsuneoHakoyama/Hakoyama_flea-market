let element = document.getElementById('select');
element.onchange = function () {
  let id = element.selectedIndex;
  let method = this.options[id].text;
  let input = this.value;
  document.getElementById('method').textContent = method;
  document.getElementById('input').value = input;
}
