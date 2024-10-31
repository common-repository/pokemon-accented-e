<?php
/**
 * Plugin Name: Pokémon Accented E
 * Description: Automatically corrects instances of the word Pokemon to Pokémon in your post content and titles, as well as other Poké-terms like Poké Ball and Pokédex. See readme for full list of corrected terms.
 * Version: 1.0
 * Author: Adam Capriola
 * Author URI: http://adamcap.com/
 * License: GPL2
 *
 * Copyright 2012  Adam Capriola  (email : adam@pkmncards.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

//
// Content + Title Filters
//
add_filter( 'the_content', 'pkmn_accented_e', 99 );
add_filter( 'the_title', 'pkmn_accented_e', 99 );

//
// Search + Replace Terms
//
function pkmn_accented_e($content) {

	if ( is_singular() ) {
		
		// The word Pokemon
		$search[] = '/\bPokemon\b(?![^<]*>)/';
		$replace[] = 'Pokémon';

		// Any term that begins with Poke and a space (and subsequently the word Poke when it's capitalized, as in to prod someone, which fortunately is unlikely to occur)
		$search[] = '/\bPoke\b(?![^<]*>)/';
		$replace[] = 'Poké';

		// Pokedex
		$search[] = '/\bPokedex\b(?![^<]*>)/i';
		$replace[] = 'Pokédex';

		// Pokegear
		$search[] = '/\bPokegear\b(?![^<]*>)/i';
		$replace[] = 'Pokégear';

		// PokeNav
		$search[] = '/\bPokeNav\b(?![^<]*>)/i';
		$replace[] = 'PokéNav';

		// Replace terms!
		$content = preg_replace( $search, $replace, $content );
	
	}

	return $content;

}