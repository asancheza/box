<?php
	class publishContent {

		public static function publish() {
	//$image = "";

      //$image = "https:\/\/media.licdn.com\/mpr\/mprx\/0__RLv0a39i1TdXm2AfEPUBVYc_CDekgyp_DPvVV0cFk-dkSSA_0lURowchiQvG083dEjzqwkBokTWFMrK2ehWcVdU7kTHFMdg7ehnpRpnk5NkD7-3iJn4y7-bfAU4mMYu6IkMULNy0w6";
      //$content = "Creating apps with ladderr #api http://www.ladderr.com";
      $url = 'http://dashboard.ladderr.com/api/v1/publish';

      //$params = 'options={"apiKey":"'.$api.'","content":"'.$content.'","twitterUsers":["55f61411c330988f178b4567"],"image":"'.$image.'"}';
      //$params = 'options={"apiKey":"'.$api.'","content":"'.$content.'", pinterestBoards":{"509399476541315328":{"type":"page", "network":"pinterest", "parent":"509399545260553476"}}, "image":"'.$image.'"}';
      $params = 'options={"apiKey":"'.$api.'","content":"'.$content.'", "pinterestBoards":{"509399476541315328":{"type":"page","network":"pinterest", "parent":"509399545260553476"}},"image":"'.$image.'"}';

      $ch = curl_init();

      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, count($params));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $params);

      //execute post
      $result = curl_exec($ch);

      $params = 'options={"apiKey":"'.$api.'","content":"'.$content.'","facebookAccounts":{"1028786293828749":{"type":"feed","network":"facebook"}}, "linkedinUsers":[ "563021adc33098f9568b47c0" ],"image":"'.$image.'"}';

      $ch = curl_init();

      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, count($params));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $params);

      //execute post
      $result = curl_exec($ch);

      $params = 'options={"apiKey":"'.$api.'","content":"'.$content.'","twitterUsers":["55f61411c330988f178b4567"],"image":"'.$image.'"}';
      //$params = 'options={"apiKey":"'.$api.'","content":"'.$content.'","facebookAccounts":{"1028786293828749":{"type":"feed","network":"facebook"}}, "pinterestBoards":{"509399476541315328":{"type":"feed","network":"pinterest", "parent":"509399545260553476"}}, "linkedinUsers":[ "563021adc33098f9568b47c0" ],"image":"'.$image.'"}';
      //$params = 'options={"apiKey":"'.$api.'","content":"'.$content.'","facebookAccounts":{"1028786293828749":{"type":"feed","network":"facebook"}}, "linkedinUsers":[ "563021adc33098f9568b47c0" ],"image":"'.$image.'"}';

      $ch = curl_init();

      //set the url, number of POST vars, POST data
      curl_setopt($ch,CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_POST, count($params));
      curl_setopt($ch,CURLOPT_POSTFIELDS, $params);

      //execute post
      $result = curl_exec($ch);

      echo("Published");
    }
}
?>