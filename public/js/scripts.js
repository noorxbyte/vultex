/*
 * Custom Scripts
 */

$(document).ready(function() {

	/*
	 * Date time picker
	 */
	$('#dpicker').datepicker({dateFormat: 'dd/mm/yy'});

	// set the current date if empty
	if (!$('#dpicker').val())
	{
		var d = new Date();
		var currentDate = d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();

		$('#dpicker').val(currentDate);
	}

	/**
	 * Display login link on hover
	 */
	$('.bottom').hover(function () {
		$('#login').css('visibility', 'visible');
	}, function () {
		$('#login').css('visibility', 'hidden');
	});

	/*
	 * Slide up flash message after 3 seconds
	 */
	$('#flash_message').delay(3000).slideUp(300);

	/*
	 * Confirm delete and submit delete form
	 */
	$('.btn-del').click(function (event) {
		// prevent follow link
		event.preventDefault();

		// update action of form
		var action = $(this).attr('href');
		$('#delForm').attr('action', action);

		// show confirmation dialogue
		$('#delConfirm').modal('show');
	});

    /*
     * Dropdown on hover
     */
	$(function() {
		$('.dropdown-hover').hover(function() {
			$('ul.dropdown-menu', this).stop(true, true).slideDown('fast');
			$(this).delay(200).addClass('open');
		},
		function() {
			$('ul.dropdown-menu', this).stop(true, true).slideUp('fast');
			$(this).delay(200).removeClass('open');
		});
	});

	/*
	 * Highlight search results
	 */
	if ($('#search').length)
	{
		if ($('#search').val().length > 0)
		{
			$('.highlightable').each(function(i, obj) {
				var searchRegex = new RegExp('(' + $('#search').val() + ')', "ig");
				$(obj).html($(obj).html().replace(searchRegex, '<span class="highlight">$1</span>'));
			});
		}
	}

	/*
	 * Handle sliders in main page
	 */
	$('.toggle').click(function() {
		// slide up others
		$('.toggle').not(this).each(function() {
        	$(this).next().slideUp('fast');
     	});
     	// toggle clicked
     	$(this).next().slideToggle('fast');
	});

});

// get imdb data by title
function getIMDBByTitle()
{
	var url = "http://www.omdbapi.com/?t=" + document.getElementById("title").value;
	getHTTP(url);
}

// get imdb data by imdb id
function getIMDBByID()
{
	var url = "http://www.omdbapi.com/?i=" + document.getElementById("imdb").value;
	getHTTP(url);
}

function getHTTP(url)
{
	$.get(url, function(data, status){
		data = JSON.stringify(data);
		var obj = jQuery.parseJSON(data);
		if ((obj.Type.toUpperCase() === $('#type').val().toUpperCase()) || ($('#type').val().toUpperCase() === "ANIME") || ($('#type').val().toUpperCase() === "VIDEO"))
		{
			$('#imdb').val(obj.imdbID);
			$('#poster').val(obj.Poster);
			$('#title').val(obj.Title);
			$('#release_year').val(obj.Year);
			$('#plot').val(obj.Plot);
			$('#genre').val(obj.Genre);
			$('#check_imdb').attr('href', "http://www.imdb.com/title/" + obj.imdbID + "/");
			$('#check_poster').attr('href', obj.Poster);
		}
		else
		{
			$('#imdb, #release_year, #plot, #genre').val("");
		}
    });
}