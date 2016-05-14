<!DOCTYPE html>
<html ng-app="VoteApp">
	<head>
		<meta charset="UTF-8">
		<!-- load angularJS -->
	    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js"></script>
	    <!--load angular route  -->
	    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
	    <!--load angular animate  -->
	    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.js"></script>
	    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
	    <!-- modules and controllers-->
	    <script src="js/script.js"></script>

	    <style>
			.row {
			max-width: 75rem;
			margin-left: auto;
			margin-right: auto; }
			.row::before, .row::after {
			content: ' ';
			display: table; }
			.row::after {
			clear: both; }
			.column.row.row, .row.row.columns {
			float: none; }
			.row .column.row.row, .row .row.row.columns {
			padding-left: 0;
			padding-right: 0;
			margin-left: 0;
			margin-right: 0; }
			label {
				display: block;

					}
			.columns:last-child {
			      float: right; }
			.columns {
			      float: left; }

			@media screen and (min-width: 40em) {
			    .medium-1 {
			    width: 16.66667%; }


			  .medium-2 {
			    width: 33.33333%; }


			  .medium-3 {
			    width: 50%; }


			  .medium-4 {
			    width: 66.66667%; }


			  .medium-5 {
			    width: 83.33333%; }


			  .medium-6 {
			    width: 100%; }

			 
			}

			@media screen and (min-width: 64em) {

				.large-1 {
			    width: 8.33333%; }


			  .large-2 {
			    width: 16.66667%; }


			  .large-3 {
			    width: 25%; }


			  .large-4 {
			    width: 33.33333%; }



			  .large-5 {
			    width: 41.66667%; }



			  .large-6 {
			    width: 50%; }


			  .large-7 {
			    width: 58.33333%; }



			  .large-8 {
			    width: 66.66667%; }


			  .large-9 {
			    width: 75%; }


			  .large-10 {
			    width: 83.33333%; }

			  .large-11 {
			    width: 91.66667%; }



			  .large-12 {
			    width: 100%; }
			}

			.compare_content {
				padding: 10px;
				height: 40%;
			}
	    </style>
	</head>
	<body ng-controller="mainController">
		<div class="row">
			<h2>COMPARE</h2>
			<h3>SELECT PARTIES TO COMPARE</h3>

			<?php // if( mobile ) {  select box for mobiles ?>
				<select ng-model="party" ng-options="p.partyName for p in comparePartyData">
					<option value="">Select a Party</option>
				</select>
			<?php  // } else {checkbox for tablets and dekstops ?>
				<label for="liberal"><input type="checkbox" id="liberal" value="1" checked="checked">Liberal Party of Canada<label>
				<label for="conservative"><input type="checkbox" id="conservative" value="2" checked="checked">Conservative Party of Canada<label>
				<label for="democratic"><input type="checkbox" id="democratic" value="3" checked="checked">New Democratic Party<label>
				<label for="bloc"><input type="checkbox" id="bloc" value="4" checked="checked">Bloc Québécois<label>
				<label for="green"><input type="checkbox" id="green" value="5" checked="checked">Green Party of Canada<label>
				<label for="libertarian"><input type="checkbox" id="animal" value="6" checked="checked">Animal Alliance Environment Voters Party of Canada<label>
			<?php //} ?>

			<br><br><br>

			<h3>CATEGORIES</h3>
			<div ng-repeat="(categoryId,categoryName) in compareCategory">
				<label for="{{categoryId}}">
					<input type="checkbox" id="{{categoryId}}"  
							ng-click="includeCategory(categoryName)">
						{{categoryName}}
				</label>
			</div>

			
		</div>

		<div class="row">
			<h3>VOTES</h3>
			<div class="">
				<div class="row">
					<div class="columns medium-3 large-2" ng-repeat="_content in comparePartyData | filter : {partyName: party.partyName}: true">
						<div class="compare_head">
							<h4 class="party_name">{{ _content.partyName }}</h4>
							<div class="count_vote">You agree with:<span class="total">{{_content.counter}}</span></div>
							
						</div>

						<div class="compare_content" ng-repeat="(_key, _category) in _content.category | filter : categoryFilter">
							{{_category.name}}<br>{{_category.content}}<br>
							<button ng-click="countVote(_content)">Agree</button><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>