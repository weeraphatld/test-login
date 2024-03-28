// script.js
function submitForm() {
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;

  let url = 'https://api.sheety.co/f42cd6efeb33849230069d25276e089e/loginWeeraphatWebsite/sheet1';
  let body = {
    sheet1: {
      username: username,
      password: password  // ควรเป็นรหัสที่เข้ารหัสแล้วสำหรับความปลอดภัย
    }
  };

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(body)
  })
  .then(response => response.json())
  .then(json => {
    console.log(json.sheet1);
    // ตรวจสอบการล็อกอินที่นี่ หรือใช้งานข้อมูลที่ได้
  })
  .catch(error => {
    console.error('Error:', error);
  });
}
