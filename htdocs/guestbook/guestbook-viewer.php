<?php 
	
	/*-------------------------------------------------------------------------
	// Format and display a simple table of the current messages stored in the 
	// comments.dat file.
	// {date} |~~| {name} |~~| {country} |~~| {comment}
	------------------------------------------------------------------------*/
	function getFormattedComments( $pRawCommentsStr = '' ) {
	
		$commentsList = explode( "\n", $pRawCommentsStr );
		$sortedCommentsList = array();
		
		
		// First read in the raw data and sort it so we show the latest comments
		// at the top of the list.
		foreach ( $commentsList as $rawCommentLine ) {
			if ( ! trim( $rawCommentLine ) !== '' ) {
				$commentElementsList = explode( "|~~|", $rawCommentLine );
				// Should have 4x elements, otherwise something's missing and just skip this entry.
				if ( count( $commentElementsList ) !== 4 ) {
					echo "<!-- Invalid format for Guestbook entry, line #$lineNr -->\n";
					continue;
				}
				// Grab date and turn it into Date obj and use it as the key for our new list of comments
				$dateTimeObj = strtotime( $commentElementsList[0] );
				$sortedCommentsList[$dateTimeObj] = $commentElementsList;
			}
		} // end foreach.
		
		// Sort the array as desired.
		krsort( $sortedCommentsList );
		
		//echo "<pre>\n";
		//print_r($sortedCommentsList);
		//echo "</pre>\n";
		
		// Now we can loop through and format the the sorted array to display the comments.
		$entryHtml = "";
		$counter = 0;
		foreach ( $sortedCommentsList as $aCommentEntry ) {
			
			$counter++;
			
			$dateStr =	date( "F j, Y, g:i a", strtotime( trim( $aCommentEntry[0] )) );
			$name =		$aCommentEntry[1];
			$country =	$aCommentEntry[2];
			$comment =	$aCommentEntry[3];
			
			// Regex out any cruft in the comments
			// &
			$name = str_replace( '&' , '&amp;', $name );
			$comment = str_replace( '&' , '&amp;', $comment );
			$comment = str_replace( ' - ' , ' — ', $comment );
			
			
			// Toggle Rows
			$toggleCSS = '';
			if ( $counter % 2 === 0 ) {
				$toggleCSS = ' altRow';
			}
			
			$entryHtml .= <<<BLOCK
				<div class="commentBox$toggleCSS">
					<p class="date">$dateStr<span><a href="#TOP">TOP</a></span></p>
					<h3>$name<span> from $country</span></h3>
					<p class="comment">$comment</p>
				</div>
				
BLOCK;
			
		} // end foreach.
		
		return $entryHtml;
	}
	
	
	/*
	 * 
	 * 
		$commentsList = explode( "\n", $pRawCommentsStr );
		$lineNr = 0;
		
		
		// First read in the raw data and sort it so we show the latest comments
		// at the top of the list.
		foreach ( $commentsList as $rawCommentLine ) {
			
			$entryHtml = '';
			$lineNr++;
			
			// skip last empty line if there's one.
			if ( ! trim( $rawCommentLine ) !== '' ) {
				//echo "$rawCommentLine<br/>\n";
				$commentElementsList = explode( "|~~|", $rawCommentLine );
				// Should have 4x elements, otherwise something's missing and just skip this entry.
				if ( count( $commentElementsList ) !== 4 ) {
					echo "<!-- Invalid format for Guestbook entry, line #$lineNr -->\n";
					continue;
				}
				
				$entryHtml = <<<BLOCK
				
				$commentElementsList[1]
				
BLOCK;
				
			}
			
			echo $entryHtml;
			
		} // end foreach.
	*/
	