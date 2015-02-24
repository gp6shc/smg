<?php

/**
 * 1. Generate Application ID. Developers who create a program for iContact's API 
 * must register it with iContact. This will generate an Application ID, for the Api-AppId authentication header.
 * https://app.icontact.com/icp/core/registerapp/
 * 
 * https://app.icontact.com/icp/core/externallogin - url to allow api to access your icontact account -> get the password
 * http://developer.icontact.com/documentation/ 
 */
class iContactApi
{

    protected $_username; // user's iContact account username
    protected $_password; // password that was set when allowing the application to access to user's iContact account (not the iContact account password)
    protected $_appId;
    protected $_apiUrl = 'https://app.icontact.com/icp/';

    public function __construct($username, $password, $appId)
    {
        $this->_username = $username;
        $this->_password = $password;
        $this->_appId = $appId;
    }

    /**
     * Get account id
     * @return boolean|array If the response is not successful - returns FALSE; otherwise - array(res, [errors|account_id])
     */
    function getAccountId()
    {
        // get response from api server
        $response = $this->serverCall('a/', 'GET');

        // check if the request is not successful
        if (!$response)
            return FALSE;

        // check if the result contains errors
        if (property_exists($response, 'errors'))
            return(array('res' => FALSE, 'errors' => $response->errors));

        // return the account id
        return array('res' => TRUE, 'account_id' => $response->accounts[0]->accountId);
    }

    function getFolders($accountId)
    {
        // get response from api server
        $response = $this->serverCall('a/' . $accountId . '/c/', 'GET');

        // check if the request is not successful
        if (!$response)
            return FALSE;

        // check if the result contains errors
        if (property_exists($response, 'errors'))
            return(array('res' => FALSE, 'errors' => $response->errors));

        // return the account id
        return array('res' => TRUE, 'folders' => $response);
    }

    function getFolderLists($accountId, $folderId)
    {
        // get response from api server
        $response = $this->serverCall('a/' . $accountId . '/c/' . $folderId . '/lists/', 'GET');

        // check if the request is not successful
        if (!$response)
            return FALSE;

        // check if the result contains errors
        if (property_exists($response, 'errors'))
            return(array('res' => FALSE, 'errors' => $response->errors));

        // return the account id
        return array('res' => TRUE, 'lists' => $response);
    }

    /**
     *
     * @param type $accountId
     * @param type $folderId
     * @param array $contactOptions array(email, firstName, lastName)
     */
    function addContact($accountId, $folderId, array $contactOptions)
    {
        // build contact record
        $data = array
        (
            array
            (
	'email' => $contactOptions['email'],
	'firstName' => $contactOptions['firstName'],
	'lastName' => $contactOptions['lastName'],
	'status' => 'normal'
            )
        );
        
        // send & get the contact id
        $response = $this->serverCall('a/' . $accountId . '/c/' . $folderId . '/contacts/', 'POST', $data);
        
        // check if the request is not successful
        if (!$response)
            return FALSE;

        // check if the result contains errors
        if (property_exists($response, 'errors'))
            return(array('res' => FALSE, 'errors' => $response->errors));

        // return the account id
        return array('res' => TRUE, 'contact_id' => $response->contacts[0]->contactId);
    }
    
    /**
     * Add contact to the defined list
     * @param type $accountId
     * @param type $folderId
     * @param array $contactOptions array(email, firstName, lastName)
     */
    function subscribeContact($accountId, $folderId, $listId, $contactId)
    {
        // build subscription record
        $data = array
        (
            array
            (
	'contactId' => $contactId,
	'listId' => $listId,
	'status' => 'normal'
            )
        );
        
        // send & get the contact id
        $response = $this->serverCall('a/' . $accountId . '/c/' . $folderId . '/subscriptions/', 'POST', $data);
        
        // check if the request is not successful
        if (!$response)
            return FALSE;

        // check if the result contains errors
        if (property_exists($response, 'errors'))
            return(array('res' => FALSE, 'errors' => $response->errors));

        // return the account id
        return array('res' => TRUE);
    }

    /**
     * Sends request to server & gets the responce in JSON format
     * @param type $actionPath
     * @param type $method
     * @param type $postdata
     * @return boolean|object
     */
    public function serverCall($actionPath = '', $method = 'GET', $postData = null)
    {
        // set api url
        $url = $this->_apiUrl . $actionPath;

        //set headers
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Api-Version: 2.0',
            'Api-AppId: ' . $this->_appId,
            'Api-Username: ' . $this->_username,
            'Api-Password: ' . $this->_password,
        );

        // send request
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // needed?
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        // set request method & data if needed
        switch ($method)
        {
            case 'POST':
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData)); //needed encode?
	break;
            case 'PUT':
	curl_setopt($curl, CURLOPT_PUT, true);
	//curl_setopt($curl, CURLOPT_INFILE, fopen(filename here, 'r'));
	break;
            case 'DELETE':
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
	break;
        }

        // get response in JSON format
        $response = curl_exec($curl);

        curl_close($curl);

        // check if request is successful
        if (!$response)
            return FALSE;

        return json_decode($response);
    }

}
//$ic = new iContactApi('3rd.api@umbrella-web.com', 'developer1', 'YJQpofjRdoieCC2ibHdybQ4icDc4uVXj');

//var_dump($ic->getFolderLists('1187381', '8397'));

//$contact = $ic->addContact('1187381', '8397', array('email' => 'zhukova@umbrella-web.com', 'firstName' => 'vera', 'lastName' => 'zh'));
//var_dump($ic->subscribeContact('1187381', '8397', '11841', '8142737'));

