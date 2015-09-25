<?php

/**
 * Twitter class, extending from SimplePie class which is available at <code>wp-includes</code> folder.
 *
 * @author James Lloyd R. Atwil
 * @version 2.0
 */
class Padd_Twitter {

	/**
	 * The duration of the cache before getting the most recent data of the
	 * Twitter user profile.
	 */
	const CACHE_TIME = 600;

	/**
	 * The Twitter username.
	 *
	 * @var string
	 */
	public $username;

	/**
	 * An instance of the Twitter user profile.
	 *
	 * @var Themecredible_Twitter_UserData
	 */
	public $userdata;

	/**
	 * Number of tweets to be displayed at a time.
	 *
	 * @var int
	 */
	public $limit;

	/**
	 * Sets the tweets are in unordered list mode or not.
	 *
	 * @var boolean
	 */
	public $list_mode;

	/**
	 * Checks if it has errors.
	 *
	 * @var boolean
	 */
	public $error = true;
	
	public $tweets = '';

	/**
	 * Constructor for Twitter class.
	 *
	 * @param string $username
	 * @param int $limit
	 * @param boolean $list_mode
	 */
	public function __construct($username, $limit = 5, $list_mode = false) {
		$this->username = $username;

		$this->limit = $limit;
		$this->list_mode = $list_mode;

		if (!empty($this->username)) {
			if (false === ( $result = get_transient(PADD_THEME_SLUG . '_twitter_data'))) {
				$twitter_data = wp_remote_retrieve_body(wp_remote_get('http://api.twitter.com/1/statuses/user_timeline.json?screen_name=' . $username));
				if ($twitter_data) {
					$this->tweets = json_decode($twitter_data);
					set_transient(PADD_THEME_SLUG . '_twitter_data', $this->tweets, self::CACHE_TIME);
				}
			} else {
				$this->tweets = get_transient(PADD_THEME_SLUG . '_twitter_data');
			}
		}
	}

	/**
	 * Function to render the tweets.
	 */
	public function show_tweets() {

		if ($this->list_mode) {
			echo '<ul class="twitter">';
		}

		if (empty($this->username)) {
			if ($this->list_mode) {
				echo '<li>';
			} else {
				echo '<p class="twitter-message">';
			}
			echo __('Twitter settings is not configured.', PADD_THEME_SLUG);
			if ($this->list_mode) {
				echo '</li>';
			} else {
				echo '</p>';
			}
		} else {
			$count = count($this->tweets);
			if ($count > 0) {
				$i = 0;
				foreach ($this->tweets as $item) {
					$message = $item->text;

					if ($this->list_mode) {
						echo '<li class="twitter-item">';
					} else if ($num != 1) {
						echo '<p class="twitter-message">';
					}

			          $message = $this->parse_hyperlinks($message);
			          $message = $this->parse_twitter_users($message);

			          echo $message;
					$time = strtotime($item->created_at);

					if ((abs(time()-$time)) < 86400 ) {
						$h_time = sprintf(__('%s ago', PADD_THEME_SLUG), human_time_diff($time));
					} else {
						$h_time = date(__('F j, Y', PADD_THEME_SLUG), $time);
					}

			          echo ' <span class="timestamp"><abbr title="' . date(__('Y/m/d H:i:s', PADD_THEME_SLUG), $time) . '">' . $h_time . '</abbr></span>';

					if ($this->list_mode) {
						echo '</li>';
					} elseif ($this->limit != 1) {
						echo '</p>';
					}
					$i++;
					if ( $i >= $this->limit ) {
						break;
					}
				}
			}
			if ($this->list_mode) {
				echo '</ul>';
			}
		}
	}

	/**
	 * Function to parse the hyperlinks (anchors).
	 *
	 * @param string $text
	 * @return string
	 */
	private function parse_hyperlinks($text) {
		$text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
		$text = preg_replace('/([\.|\,|\:|\¬¨¬®¬¨¬Æ¬¨¬®¬¨√Ü¬¨¬®¬¨¬Æ¬¨¬®‚àö√ú¬¨¬®¬¨¬Æ¬¨¬®¬¨√Ü‚Äö√Ñ√∂‚àö√ë‚àö‚àÇ‚Äö√†√∂‚Äö√Ñ‚Ä†‚Äö√†√∂¬¨‚Ñ¢|\¬¨¬®¬¨¬Æ¬¨¬®¬¨√Ü¬¨¬®¬¨¬Æ¬¨¬®‚àö√ú‚Äö√Ñ√∂‚àö√ë‚àö‚àÇ‚Äö√†√∂‚Äö√Ñ‚Ä†‚Äö√†√∂‚Äö√†√á‚Äö√Ñ√∂‚àö√ë‚àö‚àÇ‚Äö√†√∂‚Äö√Ñ‚Ä†‚Äö√†√∂¬¨√Ü|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
		return $text;
	}

	/**
	 * Function to parse the user tag (the @ sign).
	 *
	 * @param string $text
	 * @return string
	 */
	private function parse_twitter_users($text) {
		$text = preg_replace('/([\.|\,|\:|\¬¨¬®¬¨¬Æ¬¨¬®¬¨√Ü¬¨¬®¬¨¬Æ¬¨¬®‚àö√ú¬¨¬®¬¨¬Æ¬¨¬®¬¨√Ü‚Äö√Ñ√∂‚àö√ë‚àö‚àÇ‚Äö√†√∂‚Äö√Ñ‚Ä†‚Äö√†√∂¬¨‚Ñ¢|\¬¨¬®¬¨¬Æ¬¨¬®¬¨√Ü¬¨¬®¬¨¬Æ¬¨¬®‚àö√ú‚Äö√Ñ√∂‚àö√ë‚àö‚àÇ‚Äö√†√∂‚Äö√Ñ‚Ä†‚Äö√†√∂‚Äö√†√á‚Äö√Ñ√∂‚àö√ë‚àö‚àÇ‚Äö√†√∂‚Äö√Ñ‚Ä†‚Äö√†√∂¬¨√Ü|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
		return $text;
	}


}

