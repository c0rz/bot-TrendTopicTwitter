# Bot Tweet - :hash: Trend Topic Twitter
### Install
Clone this project
```bash
> git clone https://github.com/c0rz/bot-TrendTopicTwitter.git
> cd bot-TrendTopicTwitter
> setting config.php
> php run.php
```
---
User authentication requires:
- `consumer_key`
- `consumer_secret`
- `oauth_token`
- `oauth_secret`

Get it on [https://apps.twitter.com/](https://apps.twitter.com), put in .env (Use API `v1.1` not `v2`)
```
define("CONSUMER_KEY", "");
define("CONSUMER_SECRET", "");
define("OAUTH_TOKEN", "");
define("OAUTH_TOKEN_SECRET", "");
```

### Setting Trend Topic
In the run.php file, please replace line 9 in the 'id' array according to your trend country/city destination, and get a numeric id in Where On Earth ID. You can change the content of the tweet on line 19.
```bash
$api_trend = $connection->get('trends/place', ['id' => 23424846]); // id Indonesia
```
```bash
$tweet = "Trend Topic Indonesia - " . tgl_indo(date('Y-m-d')) . " " . date('G:i:s') . " WIB
";
```
