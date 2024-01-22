<?php

namespace App\Services;


use Cache;
use Closure;
use GuzzleHttp\Exception\GuzzleException;

class VetService
{
    private ApiClient $api;


    public function __construct()
    {
        $this->api = new ApiClient;
    }

    private function setCache(string $serviceKey, int|null $id, Closure $callback)
    {
        $cacheKey = $serviceKey;

        if (!empty($id)) {
            $cacheKey .= ':' . $id;
        } else {
            $cacheKey .= ':' . 'all';
        }

        return Cache::remember($cacheKey, now()->addHours(5), function () use ($callback) {
            return $callback();
        });
    }

    // User

    public function getClient(int $userId)
    {
        return $this->setCache('clients', $userId, function () use ($userId) {
            return $this->api->send('GET', 'client/' . $userId);
        });
    }
    public function removeClient(int $userId)
    {
        return $this->api->send('DELETE', 'client/' . $userId);
    }

    // End User

    // MedCard

    /**
     * @info That function giving medical card by id : for after click table id that medcard
     */
    public function medCardById(int $medCardId)
    {
        return $this->setCache('medcards', $medCardId, function () use ($medCardId) {
            return $this->api->send('GET', 'MedicalCards/' . $medCardId);
        });
    }

    /**
     * @info That function giving medical card by clinet_id : for give all page
     */
    public function medCardByClientId(int $client_id)
    {
        return $this->setCache('medcards_all', $client_id, function () use ($client_id) {
            return $this->api->send('GET', 'MedicalCards/MedicalcardsDataByClient?client_id=' . $client_id);
        });
    }

    public function getAdmissionType()
    {
        return $this->setCache('admissions', null, function () {
            return $this->api->send('GET', 'ComboManualName/1');
        });
    }


    /**
     * @param $id
     * @message WORKING INCORRECT
     * @return mixed
     */
    public function getAdmissionTitle($id)
    {
        return $this->setCache('admissions', $id, function () use ($id) {
            return array_values(array_filter($this->getAdmissionType()['data']['comboManualName'][0]['comboManualItems'], function($item) use ($id) {
                return $item['id'] === $id;
            }));
        })[0]['title'];
    }

    // End MedCard

    // Create Client
    public function createClient(int $userId, array $array = [])
    {
        return $this->setCache('clients', $userId, function () use ($array) {
            return $this->api->send('POST', 'client', $array);
        });
    }
    // End Client

    // Get Type/Breed Pet - Порода

    public function getTypePet()
    {
        return $this->setCache('pet_breed', null, function () {
            return $this->api->send('GET', 'petType');
        });
    }

    public function getTypePetById($type_id) // зависит от типа - порода
    {
        return $this->setCache('pet_breed', $type_id, function () use ($type_id) {
            return $this->api->send('GET', 'petType/' . $type_id);
        });
    }

    // End Type/Breed

    // Create Pet

    /**
     * @throws GuzzleException
     */
    public function createPet(array $array = [])
    {
        return $this->api->send('POST', 'pet', $array);
    }

    // End Pet

    // Get Doctors
    public function getDoctors() // зависит от типа - порода
    {
        return $this->setCache('doctors', null, function () {
            return $this->api->send('GET', 'User?filter=[{"property":"is_limited","value":0,"operator":"="}]', []);
        });
    }
    // End Doctors

    // Get Pet Colors

    public function getPetColors()
    {
        return $this->setCache('petColors', null, function () {
           return $this->api->send('GET', 'ComboManualName/8', []);
        });
    }

    // End Pet Colors

    public function getClinics()
    {
        return $this->setCache('clinicsList', null, function () {
            return $this->api->send('GET', 'clinics');
        });
    }

    public function bookGuest($clinicId, $bookDate, $firstName, $lastName, $phone)
    {
        $temporaryClient = $this->api->send('POST', 'client', [
            'first_name'=> $firstName,
            'last_name' => $lastName,
            'phone' => $phone,
        ]);

        if (!$temporaryClient['success'])
            return false;

        $clientId = $temporaryClient['data']['client'][0]['id'];

        $book = $this->api->send('POST', 'Admission', [
            'clinic_id' => $clinicId,
            'client_id' => $clientId,
            'admission_date' => $bookDate,
            'admission_length' => '00:15:00',
        ]);

        return $book['success'];
    }
}
