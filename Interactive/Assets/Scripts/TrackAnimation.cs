using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class TrackAnimation : MonoBehaviour
{
    public float Speed = 5;
    public bool Station = false;

    private bool EnteredStation = false;
    private bool LeftStation = false;

    private void Start()
    {
        StartCoroutine(TrackMovement(Station));
    }

    private IEnumerator TrackMovement(bool IsStation)
    {
        if (EnteredStation && Speed > 0)
        {
            LeftStation = true;
        }

        if (IsStation)
        {
            if (LeftStation)
            {
                while (transform.position != new Vector3(0, 0, -20))
                {
                    transform.position = Vector3.MoveTowards(transform.position, new Vector3(0, 0, -20), Time.deltaTime * Speed);
                    yield return null;
                }
                Destroy(this);
                yield return null;
            }
            else
            {
                while (transform.position != new Vector3(0,0,-10))
                {
                    transform.position = Vector3.MoveTowards(transform.position, new Vector3(0,0,-10), Time.deltaTime * Vector3.Distance(transform.position, new Vector3(0,0,-10)));
                    yield return null;
                }
                EnteredStation = true;
            }
        } 
        else
        {
            while (transform.position != new Vector3(0, 0, -20)) {
                transform.position = Vector3.MoveTowards(transform.position, new Vector3(0, 0, -20), Time.deltaTime * Speed);
                yield return null;
            }

            transform.position = new Vector3(0, 0, 9.95f);
        }

        StartCoroutine(TrackMovement(IsStation));
        yield return null;
    }
}
