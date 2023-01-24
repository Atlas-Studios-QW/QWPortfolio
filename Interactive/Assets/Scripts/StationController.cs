using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class StationController : MonoBehaviour
{
    public GameObject Player;
    public GameObject LeaveHint;
    public GameObject MovemementHint;

    private Rigidbody PlayerRB;

    private bool InLeaveZone = false;

    private void OnTriggerEnter(Collider other)
    {
        InLeaveZone = true;
    }

    private void OnTriggerExit(Collider other)
    {
        InLeaveZone = false;
        MovemementHint.SetActive(false);
    }

    private void Start()
    {
        PlayerRB = Player.GetComponent<Rigidbody>();
    }

    private void Update()
    {
        float MaxSpeed = 100f * Time.deltaTime;

        if (Player.activeInHierarchy)
        {
            if (PlayerRB.velocity.x < MaxSpeed && PlayerRB.velocity.x > -MaxSpeed)
            {
                PlayerRB.AddForce(new Vector3(Input.GetAxis("Horizontal") * MaxSpeed * 25, 0, 0));
            }

            if (PlayerRB.velocity.z < MaxSpeed && PlayerRB.velocity.z > -MaxSpeed)
            {
                PlayerRB.AddForce(new Vector3(0, 0, Input.GetAxis("Vertical") * MaxSpeed * 25));
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
