(function(){

  var url = window.location.href;
  // var name = prompt("Give it a name (no .gif)", "");
  // if (name != "") {
  //
  //   // submitFormAjax(name, url, "PICKYOURPASSWORD");
  // }
  post( "http://tylr.us/gifs/index.php", url );
})();

function post(path, url, method) {
  method = method || "post";

  var coverDiv = document.createElement('div');
  coverDiv.setAttribute("style", "z-index:999;position:absolute;top:0;bottom:0;left:0;right:0;background-color:#eeeeee;text-align:center;font-size:24px;");
  document.body.appendChild(coverDiv);

  var h2 = document.createElement("h2");
  var text = document.createTextNode("GIFVault");
  h2.appendChild(text);
  coverDiv.appendChild(h2);

  var form = document.createElement("form");
  form.setAttribute("method", method);
  form.setAttribute("action", path);
  coverDiv.appendChild(form);

  var nameField = document.createElement("input");
  nameField.id = "gifvaultname";
  nameField.setAttribute("type", "text");
  nameField.setAttribute("name", "name");
  nameField.setAttribute("placeholder", "Give it a name (no .gif)");
  nameField.setAttribute("value", "");
  form.appendChild(nameField);

  var passField = document.createElement("input");
  passField.setAttribute("type", "hidden");
  passField.setAttribute("name", "pass");
  passField.setAttribute("value", "PICKYOURPASSWORD");
  form.appendChild(passField);

  var urlField = document.createElement("input");
  urlField.setAttribute("type", "hidden");
  urlField.setAttribute("name", "url");
  urlField.setAttribute("value", url);
  form.appendChild(urlField);

  var br = document.createElement("br");
  form.appendChild(br);

  var button = document.createElement("input");
  button.setAttribute("type", "button");
  button.setAttribute("value", "Save this gif");
  form.appendChild(button);

  document.body.appendChild(coverDiv);
  document.getElementById("gifvaultname").focus();
}
