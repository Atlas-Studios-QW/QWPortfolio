using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class StationController : MonoBehaviour
{
    public GameObject Player;
    public GameObject LeaveHint;

    private Rigidbody PlayerRB;

    private bool InLeaveZone = false;

    private void OnTriggerEnter(Collider other)
    {
        InLeaveZone = true;
    }

    private void OnTriggerExit(Collider other)
    {
        InLeaveZone = false;
    }

    private void Start()
    {
        PlayerRB = Player.GetComponent<Rigidbody>();
    }

    private void Update()
    {
        if (Player.activeInHierarchy)
        {
            if (PlayerRB.velocity.x < 2 && PlayerRB.velocity.x > -2)
            {
                PlayerRB.AddForce(new Vector3(Input.GetAxis("Horizontal") * 10, 0, 0));
            }

            if (PlayerRB.velocity.z < 2 && PlayerRB.velocity.z > -2)
            {
                PlayerRB.AddForce(new Vector3(0, 0, Input.GetAxis("Vertical") * 10));
            }
        }

        if (InLeaveZone)
        {
            LeaveHint.SetActive(true);
        }
        else
        {
            LeaveHint.SetActive(false);
        }

        if (InLeaveZone && Input.GetKeyDown(KeyCode.Return))
        {
            GameObject.Find("ScriptHolder").GetComponent<Controller>().StationExit();
        }
    }
}
