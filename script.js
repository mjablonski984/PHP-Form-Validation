// Materialize CSS setup

document.addEventListener('DOMContentLoaded', function () {
  let elems = document.querySelectorAll('.sidenav');
  let instances = M.Sidenav.init(elems);
});

document.addEventListener('DOMContentLoaded', function () {
  let select = document.querySelectorAll('select');
  var instances = M.FormSelect.init(select);
});
