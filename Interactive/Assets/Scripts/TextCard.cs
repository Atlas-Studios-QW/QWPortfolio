using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class TextCard : MonoBehaviour
{
    private bool OnCard = false;
    private bool CurrentState = false;

    private void OnTriggerEnter(Collider other)
    {
        OnCard = true;
    }

    private void OnTriggerExit(Collider other)
    {
        OnCard = false;
    }

    private void Update()
    {

        if (OnCard && !CurrentState && transform.position.y < -0.4f)
        {
            CurrentState = true;
            GetComponent<Animator>().Play("TextCardUp");
        }
        else if (!OnCard && CurrentState && transform.position.y > 0.55f)
        {
            CurrentState = false;
            GetComponent<Animator>().Play("TextCardDown");
        }
    }
}
