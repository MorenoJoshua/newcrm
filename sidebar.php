<table id="sidebarcontent">
	<tr>
		<td>
		<table id="sidebartable">
			<tr id="sidebarphone">
				<td colspan="3"><?php echo $phone;?></td>
				<td id="call"><a href="sip:1<?php echo $phone;?>">CALL</a></td>
			</tr>
			<tr>
			<td colspan="4">
				<select name="status" class="fullw fullh" id="status">
					<option value="BUSY">Busy Line</option>
					<option value="DISCONNECTED">Disconnected Line</option>
					<option value="VOICEMAIL">Voice Mail</option>
					<option value="NO_ANSWER">No Answer</option>
					<option value="FAX">Fax Machine</option>
					<option value="GATEKEEPER">Gatekeeper</option>
					<option value="NOT_INTERESTED">Not Interested</option>
					<option value="OUT_OF_BUSINESS">Out of Business</option>
					<option value="Incomplete Submission Lead">Incomplete Submission Lead</option>
					<option value="App Out">App Out</option>
					<option value="App In">App In</option>
					<option value="Complete Submission Lead">Complete Submission Lead</option>
					<option value="Declined">Declined</option>
					<option value="In Funding">In Funding</option>
					<option value="Funded">Funded</option>
				</select>
					<a onclick="saveanddispo()" id="saveanddispo">Save And Dispo</a>
</form>
			</td>
			</tr>
			<tr>
				<td colspan="4"><?php require('getcalls.php');?></td>
			</tr>
			<tr>
				<td id="getcomments" colspan="4"><?php require('getcomments.php');?></td>
			</tr>
			<tr>
				<td colspan="2" id="capitalemail"><a>Capital Email</a></td>
				<td colspan="2" id="capitalfax"><a>Capital Fax</a></td>
			</tr>
			<tr>
				<td colspan="2" id="eqemail"><a>Equipment Email</a></td>
				<td colspan="2" id="eqfax"><a>Equipment Fax</a></td>
			</tr>
			<tr>
				<td colspan="2" id="preappemail"><a>Preapp Email</a></td>
				<td colspan="2" id="preappfax"><a>Preapp Fax</a></td>
			</tr>
		</table>
		</td>
	</tr>
</table>