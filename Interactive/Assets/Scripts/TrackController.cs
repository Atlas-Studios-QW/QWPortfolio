using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class TrackController : MonoBehaviour
{
    public bool StopTrack = false;

    public List<GameObject> Options = new List<GameObject>();

    public GameObject TrackParent;

    public GameObject StationPrefab;
    private GameObject Station;

    private void Start()
    {
        StartCoroutine(UpdateSpeed());
    }

    public void ChooseOption(int Option)
    {
        StartCoroutine(ChooseOptionSequence(Option));
    }

    public IEnumerator ChooseOptionSequence(int Option)
    {
        StopTrack = false;
        yield return new WaitForSeconds(5);
        StopTrack = true;
        Station = Instantiate(StationPrefab, TrackParent.transform);
        Station.transform.position = new Vector3(0, 0, 10);
    }

    private IEnumerator UpdateSpeed()
    {
        foreach (Transform Track in transform)
        {
            TrackAnimation Animator = Track.GetComponent<TrackAnimation>();
            if (Animator.Speed > 0 && StopTrack)
            {
                Animator.Speed -= 3f * Time.deltaTime;
            }
            else if (Animator.Speed < 5 && !StopTrack)
            {
                Animator.Speed += 3f * Time.deltaTime;
            }
            else if (Animator.Speed < 0)
            {
                Animator.Speed = 0;
            }
            else if (Animator.Speed > 5)
            {
                Animator.Speed = 5;
            }
            yield return null;
        }
        StartCoroutine(UpdateSpeed());
    }
}
