using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class TrackController : MonoBehaviour
{
    public List<GameObject> Stations = new List<GameObject>();

    private GameObject CurrentStation;

    public void StationStop(int StationID)
    {
        CurrentStation = Instantiate(Stations[StationID]);

        foreach (Transform Track in transform)
        {
            Track.gameObject.SetActive(false);
        }
    }

    public void StationExit()
    {
        CurrentStation.GetComponent<Animator>().Play("StationExit");
        StartCoroutine(ResetObjects());
    }

    public IEnumerator ResetObjects()
    {
        yield return new WaitForSeconds(4);
        foreach (Transform Track in transform)
        {
            Track.gameObject.SetActive(true);
        }
        Destroy(CurrentStation);
    }

}
