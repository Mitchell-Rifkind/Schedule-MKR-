<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="JS_Functions_Login.js" type="text/javascript">

    </script>
  </head>
  <body>
    <?php

      require '/Applications/XAMPP/xamppfiles/htdocs/Schedule-MKR-/vendor/autoload.php';
      use Aws\DynamoDb\DynamoDbClient;

    /* Database Related Funtions */

      function fetchItem($email) { // Retrieve an array of all an item's attributes based on the email passed
        $result = $GLOBALS['client']->getItem(array(
          'ConsistentRead' => true,
          'TableName' => 'User_Sign_In',
          'Key'       => array(
            'email'     => array('S' => $email)
            )
        ));
        return $result;
      }

      function storeItem($email_new, $password_new) { // Add an email and password as a new item to the database
        $result = $GLOBALS['client']->putItem(array(
          'TableName' => 'User_Sign_In',
          'Item' => array(
            'email'    => array('S' => $email_new),
            'password' => array('S' => $password_new)
          )
        ));
      }

      function newEmail($email_new) { // Verify whether an email is already in use
        $result = fetchItem($email_new);
        if ($email_new !== $result['Item']['email']['S']) {
          return true;
        } else {
          return false;
        }
      }

      function handle_login($validation) { // Determine what to pass on, and where, i.e. username to the user's homepage, etc.
        switch ($validation) {
          case 'successful_creation':
          case 'password_correct':
            $page = "calendar-page.php";
            $name = "user";
            $value = $GLOBALS['email'];
            session_start();
            $_SESSION["email"] = $value;
            break;
          case 'password_incorrect':
            $page = "home.php";
            $name = "login_message";

            $value = "The password and/or email were incorrect";
            break;
          case 'password_confirm_fail':
            $page = "home.php";
            $name = "login_message";

            $value = "The password confirmation did not match the password entered";
            break;
          case 'email_repeated':
            $page = "home.php";
            $name = "login_message";

            $value = "An account is already registered with this email";
            break;
          case 'insufficient_fields':
            $page = "home.php";
            $name = "login_message";

            $value = "Not enough fields were entered";
            break;
          default:
            break;
        }

        ?>

          <form id="login_result" action="<?= $page ?>" method="post">
            <input type="hidden" name="<?= $name ?>" value="<?= $value ?>">
          </form>
          <script type="text/javascript"> // Needed in order to return to home.php or calendar-page.html with the proper values
            window.onload = toHome();
          </script>

        <?php
      }

    /******************************************************************************/

    /* Database Connection Establishment */

      $client = DynamoDbClient::factory(array(
        'version' => 'latest',
        'profile' => 'default',
        'region'  => 'us-east-1'
      ));

    /******************************************************************************/

     ?>

  </body>
</html>
