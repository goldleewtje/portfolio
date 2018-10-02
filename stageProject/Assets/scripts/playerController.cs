using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class playerController : MonoBehaviour
{
    private Rigidbody rb;
    public int velocid = 70;
    private Vector3 moveDirection;
    private float distance;
    private int lpatLayer;
    public float speed = 6.0F;
    public float jumpSpeed = 8.0F;
    public float gravity = 20.0F;
    public Animator move;

    // Use this for initialization  
    void Start()
    {
        move = GetComponent<Animator>();
        rb = GetComponent<Rigidbody>();
    }

    // Update is called once per frame
    void Update()
    {
        // loop naar voren
        if (Input.GetKey(KeyCode.W))
        {
            move.enabled = true;
            move.Play("walk");
            transform.position += transform.forward * Time.deltaTime * speed;
        }
        //stop de loop animatie als je niet meer beweegt
        if (Input.GetKeyUp(KeyCode.W))
        {
            move.enabled = false;
        }
        // draai naar links
        if (Input.GetKey(KeyCode.A))
        {
            transform.Rotate(-Vector3.up * velocid * Time.deltaTime);
        }
        // draai naar rechts
        if (Input.GetKey(KeyCode.D))
        {
            transform.Rotate(Vector3.up * velocid * Time.deltaTime);
        }

        if (Input.GetMouseButtonDown(1))
        {
            move.enabled = true;
            move.Play("jump");
            move.Play("jump", -1, 0f);
        }

        if (Input.GetKey(KeyCode.S)) 
        {
            transform.position -= transform.forward * Time.deltaTime * speed;
            move.enabled = true;
            move.Play("walk");
        }

        if (Input.GetKeyUp(KeyCode.S))
        {
            move.enabled = false;
        }
    }

    private void FixedUpdate()
    {
        if (Input.GetMouseButtonDown(1))
        {
            rb.velocity += jumpSpeed * Vector3.up;
        }
    }

    /*private void OnTriggerEnter(Collider muur)
    {
        SceneManager.LoadScene("stageProject");
    }*/
}
