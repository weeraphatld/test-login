composer require google/apiclient:^2.0

require_once 'vendor/autoload.php';

// Initialize Google client
$client = new Google_Client();
$client->setApplicationName('Login to Website');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
$client->setAuthConfig('client_secret_556783064607-qec7pvdgq3m50v151qmhfldp9qeposrq.apps.googleusercontent.com (1).json');  // Path to your credentials file

// Access the sheet
$service = new Google_Service_Sheets($client);
$spreadsheetId = '1c1VSLd2CPRnMS1NSkBGh40rUfpOB09YukNoRzYi2dEk';  // ID of your Google Sheet
$range = 'Sheet1!A:B';  // Range of your data
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($values as $row) {
        // Assuming column 1 is username and column 2 is password
        if ($row[0] == $username && $row[1] == $password) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            // Redirect to a protected page
            header("Location: protected_page.php");
            exit();
        }
    }
    echo "Invalid credentials!";
}
