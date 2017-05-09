<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      require '/Applications/XAMPP/xamppfiles/htdocs/Schedule-MKR-/vendor/autoload.php';
      use Aws\DynamoDb\DynamoDbClient;
      use Aws\DynamoDb\Marshaler;

      $client = DynamoDbClient::factory(array(
        'version' => 'latest',
        'profile' => 'default',
        'region'  => 'us-east-1'
      ));

      if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = $client->getItem(array(
          'ConsistentRead' => true,
          'TableName' => 'User_Sign_In',
          'Key'       => array(
            'email'     => array('S' => $email)
            )
        ));

        if ($password === $result['Item']['password']['S']) {
          echo "Access Granted";
        } else {
          echo "Access Denied";
        }

      } else if (isset($_POST["email_new"]) && isset($_POST["password_new"])) {
        $email_new = $_POST["email_new"];
        $password_new = $_POST["password_new"];

        $result = $client->putItem(array(
          'TableName' => 'User_Sign_In',
          'Item' => array(
            'email'    => array('S' => $email_new),
            'password' => array('S' => $password_new)
          )
        ));
        echo "Welcome " . $email_new . ". Your account has been created";

      } else {
        echo "No information has been entered";
      }

     ?>
  </body>
</html>
