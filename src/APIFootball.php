<?php
/**
 * Created by PhpStorm.
 * User: jamesm
 * Date: 09/01/22
 * Time: 08:20 PM
 */

namespace jamesm\APIfootball;

use GuzzleHttp\Client;

class APIFootball
{
    protected $client;

    public function __construct(Client $client )
    {
        $this->client = $client;
    }

    public function run($uri, $type = 'GET')
    {
        return json_decode( $this->client->request($type, $uri)->getBody() );
    }



    ##COMPETITION/LEAGUE

    /**
     * List all available competitions.
     *
     * @param array $filter
     * @return Collection
     */
    public function getLeagues()
    {
        $leagues = $this->run("v2/leagues" );
        return collect($leagues->api);
    }

    /**
     * List one particular competition.
     *
     * @param integer $leagueID
     * @param array $filter
     * @return Collection
     */
    public function getLeague(int $leagueID)
    {
        $league = $this->run("v2/leagues/league/{$leagueID}");
        return collect($league->api);
    }

    /**
     * Show Standings for a particular competition
     *
     * @param integer $leagueID
     * @return Collection
     */
    public function getLeagueStandings(int $leagueID)
    {
        $leagueStandings = $this->run("v2/leagueTable/{$leagueID}");
        return collect($leagueStandings->api);
    }

    /**
     * List all matches for a particular competition.
     *
     * @param integer $leagueID
     * @param array $filter
     * @return Collection
     */
    public function getLeagueMatches(int $leagueID)
    {
        $leagueMatches = $this->run("v2/fixtures/league/{$leagueID}");
        return collect($leagueMatches->api);
    }



    ##FIXTURES/MATCHES

    /**
     * List matches across (a set of) competitions.
     *
     * @param array $filter
     * @return Collection
     */
    public function getMatches($date)
    {
        $matches = $this->run("v2/fixtures/date/{$date}");
        return collect($matches->matches);
    }

    /**
     * Show one particular match.
     *
     * @param integer $matchID
     * @return Collection
     */
    public function getMatch(int $matchID)
    {
        $matche = $this->run("/v2/fixtures/id/{$matchID}");
        return collect($matche->api);
    }


    ##TEAM

    /**
     * Show one particular team.
     *
     * @param integer $teamID
     * @return Collection
     */
    public function getTeam(int $teamID)
    {
        $team = $this->run("v2/teams/team/{$teamID}");
        return collect($team->api);
    }

    /**
     * Show all matches for a particular team.
     *
     * @param integer $teamID
     * @param array $filter
     * @return Collection
     */
    public function getMatchesForTeam(int $teamID)
    {
        $matches = $this->run("/v2/fixtures/team/{$teamID}");
        return collect($matches->api);
    }

    /**
     * List all matches for a particular competition with date
     *
     * @param integer $leagueID
     * @param date $date
     * @return Collection
     */
    public function getLeagueMatchesWithDate(int $leagueID,$date)
    {
        $leagueMatches = $this->run("v2/fixtures/league/{$leagueID}/{$date}");
        return collect($leagueMatches->api);
    }


}
