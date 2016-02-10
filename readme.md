*ABOUT*

This is a very simple, very quick, and frankly poorly written API for getting 
different formats of state names. Handy when you need to get the postal 
abbreviation for a dataset that includes the full names of states, for
instance.

Despite being poorly written, it works pretty well. Returning a JSON
object containing an array with an object for each state. The name of each
object is the name provided to the API by the user, so that you can use the
string you do have to index the return data.

Created by Jake Kara / jkara@trenct.org

*USAGE*

Input:

	http://path_to_dir/?s=Connecticut,Ariz

Output:

    {
        "Connecticut": {
            "state": "Connecticut",
            "postal": "CT",
            "AP": "Conn.",
            "old_postal": "Conn.",
            "status": "State"
        },
        "Ariz": {
            "state": "Arizona",
            "postal": "AZ",
            "AP": "Ariz.",
            "old_postal": "Ariz.",
            "status": "State"
        }
    }

*POORLY WRITTEN*

So here's the thing. This code was written in about 10 minutes out of necessity,
so it's not elegant at all. The's an unsupported parameter 'f' that was 
originally added before deciding to handle multiple states at once.

q.php is probably where I'll rewrite this better when I have more than 10 
minutes.

*DATA SOURCE*

State names came from Wikipedia:
https://en.wikipedia.org/wiki/List_of_U.S._state_abbreviations