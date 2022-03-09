# :api-football.com


api-football.com API Container for Laravel
(Highly Inspired by grambas/football-data)

## Requirements
-  "guzzlehttp/guzzle": "~7.4.1"


## Install

Via Composer

``` bash
$ composer require jamesm/api-football
```

## Usage

More about filters, structure and API:
[api-football.com Documentation](https://www.api-football.com/documentation)


Add your api key to env. file

```
APIFOOTBALL_API_KEY=
```
add to config/app.php 
``` 
'providers' => [
  jamesm\APIfootball\APIFootballServiceProvider::class,
]

'aliases' => [
  'Football' =>jamesm\APIfootball\Facades\APIFootballFacade::class,
]
```

## Examples
```php
##COMPETITION/LEAGUE

/**
 * List one particular competition.
 *
 * @param integer $leagueID 
 * @return Collection
 */ 
Football::getLeague(int $leagueID)

/**
 * Show Standings for a particular competition

 * @param integer $leagueID
 * @return Collection
 */
Football::getLeagueStandings(int $leagueID)

/**
 * List all matches for a particular competition.
 *
 * @param integer $leagueID
 * @return Collection
 */
Football::getLeagueMatches(int $leagueID)
	


##FIXTURES/MATCHES

/**
 * List matches across (a set of) competitions.	
 *
 * @return Collection
 */
Football::getMatches()

/**
 * Show one particular match.	
 *
 * @param integer $matchID
 * @return Collection
 */
Football::getMatch(int $matchID)



##TEAM

/**
 * Show one particular team.	
 *
 * @param integer $teamID
 * @return Collection
 */
Football::getTeam(int $teamID)

/**
 * Show all matches for a particular team.
 *
 * @param integer $teamID
 * @return Collection
 */
Football::getMatchesForTeam(int $teamID)

/**
 * List all matches for a particular competition wthdate
 *
 * @param integer $leagueID
 * @param date $date
 * @return Collection
 */
Football::getLeagueMatchesWithDate(int $leagueID,$date)

```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://github.com/jamesm1987/apifootball
[link-author]: https://github.com/jamesm1987
