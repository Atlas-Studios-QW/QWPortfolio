using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Controller : MonoBehaviour
{
    public List<GameObject> Stations = new List<GameObject>();

    public Camera Camera;
    public GameObject TrackParent;
    public GameObject UI;
    public AudioSource Horn; 

    private void Update()
    {
        if(Input.GetKeyDown(KeyCode.Space))
        {
            Horn.Play();
        }
    }

    private GameObject CurrentStation;

    public void StationEnter(int StationID)
    {
        UI.GetComponent<Animator>().Play("UIOut");
        StartCoroutine(OnStationEnter(StationID));
    }

    private IEnumerator OnStationEnter(int StationID)
    {
        while (TrackParent.transform.position.z < -1f) { yield return null; }
        TrackParent.SetActive(false);
        CurrentStation = Instantiate(Stations[StationID]);
        yield return new WaitForSeconds(2);
        UI.SetActive(false);
        Camera.GetComponent<Animator>().Play("CameraPage");
        yield return new WaitForSeconds(7);
        CurrentStation.transform.Find("Player").gameObject.SetActive(true);
    }

    public void StationExit()
    {
        CurrentStation.transform.Find("Player").gameObject.SetActive(false);
        CurrentStation.GetComponent<Animator>().Play("StationExit");
        Camera.GetComponent<Animator>().Play("CameraStation");
        StartCoroutine(OnStationExit());
    }

    private IEnumerator OnStationExit()
    {
        yield return new WaitForSeconds(3);
        TrackParent.SetActive(true);
        Destroy(CurrentStation);

        yield return new WaitForSeconds(1);
        UI.SetActive(true);
        UI.GetComponent<Animator>().Play("UIIn");
    }

    public void Redirect(string Link)
    {
        Application.OpenURL(Link);
    }
}
