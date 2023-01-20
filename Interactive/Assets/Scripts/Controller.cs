using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Controller : MonoBehaviour
{
    public List<GameObject> Stations = new List<GameObject>();

    public Camera Camera;
    public GameObject TrackParent;
    public GameObject PageBtnsParent;
    public GameObject LeaveBtn;
    public AudioSource Horn;

    private void Update()
    {
        if(Input.anyKeyDown && !Input.GetMouseButtonDown(0))
        {
            Horn.Play();
        }
    }

    private GameObject CurrentStation;

    public void StationEnter(int StationID)
    {
        CurrentStation = Instantiate(Stations[StationID]);

        PageBtnsParent.SetActive(false);
        TrackParent.SetActive(false);

        StartCoroutine(OnStationEnter());
    }

    private IEnumerator OnStationEnter()
    {
        yield return new WaitForSeconds(2);
        Camera.GetComponent<Animator>().Play("CameraPage");
        yield return new WaitForSeconds(3);
        LeaveBtn.SetActive(true);
    }

    public void StationExit()
    {
        LeaveBtn.SetActive(false);
        CurrentStation.GetComponent<Animator>().Play("StationExit");
        Camera.GetComponent<Animator>().Play("CameraStation");
        StartCoroutine(OnStationExit());
    }

    private IEnumerator OnStationExit()
    {
        yield return new WaitForSeconds(4);
        TrackParent.SetActive(true);

        Destroy(CurrentStation);

        yield return new WaitForSeconds(1);
        PageBtnsParent.SetActive(true);
    }

}
