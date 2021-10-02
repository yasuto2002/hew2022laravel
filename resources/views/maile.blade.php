<?php
require '../vendor/autoload.php';

use Aws\Ses\SesClient;

// バージニア北部リージョン以外を利用している場合は、region を変更すること
$ses = SesClient::factory(array(
  'version'=> 'latest',
  'region' => 'ap-northeast-1',
));

try {
  $result = $ses->sendEmail([
    // TODO: 送信元メールアドレスの入力
    'Source' => 'test@yasuto0101.com',
    'Destination' => [
      'ToAddresses' => [
        // TODO: 送信先メールアドレスの入力
        'fujiya0101@gmail.com',
      ],
    ],
    'Message' => [
      'Subject' => [
        'Charset' => 'UTF-8',
        'Data' => 'Hello SES World!!',
      ],
      'Body' => [
        'Text' => [
          'Charset' => 'UTF-8',
          'Data' => '嫌い',
        ],
      ],
    ],
  ]);

  $messageId = $result->get('MessageId');
  echo("Email sent! Message ID: $messageId"."\n");

} catch (SesException $error) {
  echo("The email was not sent. Error message: ".$error->getAwsErrorMessage()."\n");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maile</title>
</head>
<body>
    aaa
</body>
</html>
