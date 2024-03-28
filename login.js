function login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // ลิงค์ไปยัง API ของ Sheety
    var api_url = 'https://api.sheety.co/f42cd6efeb33849230069d25276e089e/loginWeeraphatWebsite/sheet1';

    fetch(api_url)
        .then(response => response.json())
        .then(data => {
            var loginSuccess = false;
            data.sheet1.forEach(function(user) {
                if (user.username == username && user.password == password) {
                    loginSuccess = true;
                }
            });

            if (loginSuccess) {
                document.getElementById('loginResult').textContent = 'Login successful!';
            } else {
                document.getElementById('loginResult').textContent = 'Invalid username or password!';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('loginResult').textContent = 'An error occurred!';
        });
}
