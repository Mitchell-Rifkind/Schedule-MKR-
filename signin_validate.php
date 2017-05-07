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

      $email = $_POST["email"];
      $password = $_POST["password"];

      $client = DynamoDbClient::factory(array(
        'key' => 'AKIAI6K6DFAL2EPNOT3A',
        'secret' => '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'
        'version' => 'latest',
        'profile' => 'default',
        'region' => 'us-east-1'
      ));

      $result = $client->putItem(array(
        'TableName' => 'User_Sign_In',
        'Item' => array(
          'email'    => array('S' => $email),
          'password' => array('S' => $password)
        )
      ));

      $user = $client->getItem(array(
        'ConsistentRead' => true,
        'TableName' => 'errors',
        'Key' => array(
          'email' => array('S' => $email)
        )
      ));

      echo "Welcome" . $user['Item']['email']['S'];
     ?>
  </body>
</html>
