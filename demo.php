<?php

require 'vendor/autoload.php';

$client = new \Project88\Zoho\Recruit\Api\Client\Client();

$testClientGetRecords = function () use ($client) {

    print_r($client->getRecords('JobOpenings', array(
        'selectColumns' => 'JobOpenings(Posting Title,Job Description,Salary)'
    )));

    print_r($client->getRecords('Clients', array(
        'selectColumns' => 'Clients(CLIENTID)'
    )));

    print_r($client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(First Name)'
    )));
};

$testClientGetRecordById = function () use ($client) {

    $jobList = $client->getRecords('JobOpenings', array(
        'selectColumns' => 'JobOpenings(JOBOPENINGID)'
    ));

    if (isset($jobList[0]['JOBOPENINGID'])) {
        print_r($client->getRecordById('JobOpenings', $jobList[0]['JOBOPENINGID']));
    }

    $clientList = $client->getRecords('Clients', array(
        'selectColumns' => 'Clients(CLIENTID)'
    ));

    if (isset($clientList[0]['CLIENTID'])) {
        print_r($client->getRecordById('Clients', $clientList[0]['CLIENTID']));
    }

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->getRecordById('Candidates', $candidateList[0]['CANDIDATEID']));
    }
};

$testClientAddRecord = function () use ($client) {

    print_r($client->addRecords('Clients', array('Client Name' => 'Testando a API')));
};

$testClientUpdateRecord = function () use ($client) {

    $clientList = $client->getRecords('Clients', array(
        'selectColumns' => 'Clients(CLIENTID)'
    ));

    if (isset($clientList[0]['CLIENTID'])) {
        print_r($client->updateRecords('Clients', $clientList[0]['CLIENTID'], array('Client Name' => 'Nome do Cliente Atualizado via API')));
    }
};

$testClientGetNoteTypes = function () use ($client) {

    print_r($client->getNoteTypes());
};

$testClientGetRelatedRecords = function () use ($client) {

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->getRelatedRecords(
            'Attachments',
            'Candidates',
            $candidateList[0]['CANDIDATEID']
        ));
    }
};

$testClientGetFields = function () use ($client) {

    print_r($client->getFields('Clients'));
    print_r($client->getFields('JobOpenings'));
};

$testClientGetAssociatedJobopenings = function () use ($client) {

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->getAssociatedJobopenings($candidateList[0]['CANDIDATEID']));
    }
};

$testClientChangeStatus = function () use ($client) {

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->changeStatus(array($candidateList[0]['CANDIDATEID']), 'New'));
    }
};

$testUploadFile = function () use ($client) {

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->uploadFile(
            $candidateList[0]['CANDIDATEID'],
            'Others',
            '@/var/www/tiobe.png'
        ));
    }
};

$testDownloadFile = function () use ($client) {

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        $attachmentList = $client->getRelatedRecords(
            'Attachments',
            'Candidates',
            $candidateList[0]['CANDIDATEID']
        );

        if (isset($attachmentList[0]['id'])) {
            print_r($client->downloadFile(
                $attachmentList[0]['id'],
                '/var/www/downloadFile'
            ));
        }
    }
};

$testAssociateJobopening = function () use ($client) {

    $jobList = $client->getRecords('JobOpenings', array(
        'selectColumns' => 'JobOpenings(JOBOPENINGID)'
    ));

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($jobList[0]['JOBOPENINGID']) && isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->associateJobopening(
            array($jobList[0]['JOBOPENINGID']),
            array($candidateList[0]['CANDIDATEID'])
        ));
    }
};

$testUploadPhoto = function () use ($client) {

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->uploadPhoto(
            'Candidates',
            $candidateList[0]['CANDIDATEID'],
            '@/var/www/tiobe.png'
        ));
    }
};

$testDownloadPhoto = function () use ($client) {

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->downloadPhoto(
            'Candidates',
            $candidateList[0]['CANDIDATEID'],
            '/var/www/downloadFile'
        ));
    }
};

$testUploadDocument = function () use ($client) {

    print_r($client->uploadDocument(
        file_get_contents('/var/www/document.docx'),
        'MyDocument.docx'
    ));
};

$testGetModules = function () use ($client) {

    print_r($client->getModules());
};

$testGetAssociatedCandidates = function () use ($client) {

    $jobList = $client->getRecords('JobOpenings', array(
        'selectColumns' => 'JobOpenings(JOBOPENINGID)'
    ));

    if (isset($jobList[0]['JOBOPENINGID'])) {
        print_r($client->getAssociatedCandidates($jobList[0]['JOBOPENINGID']));
    }
};

$testGetSearchRecords = function () use ($client) {

    print_r($client->getSearchRecords(
        'Candidates',
        'Candidates(Last Name,Current Employer,Email,Mobile)',
        '(Email|contains|*@humantech.com*)'
    ));
};

//$testAuth();
//$testClientGetRecords();
//$testClientGetRecordById();
//$testClientAddRecord();
//$testClientUpdateRecord();
//$testClientGetNoteTypes();
//$testClientGetRelatedRecords();
//$testClientGetFields();
//$testClientGetAssociatedJobopenings();
//$testClientChangeStatus();
//$testUploadFile();
//$testDownloadFile();
//$testAssociateJobopening();
//$testUploadPhoto();
//$testDownloadPhoto();
//$testUploadDocument();
//$testGetModules();
//$testGetAssociatedCandidates();
//$testGetSearchRecords();

