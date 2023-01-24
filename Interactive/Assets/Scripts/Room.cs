using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class Room : MonoBehaviour
{
    public string RoomSceneName = "Main";

    private void OnTriggerEnter(Collider other)
    {
        SceneManager.LoadScene(RoomSceneName);
    }
}
