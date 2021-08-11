<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    /**
     * @var bool
     */
   public $isNewDevice = false;

    /**
     * @var bool
     */
    public $isAdmin = false;

    /**
     * @var null
     */
    public $device = null;

    /**
     * @param $deviceInfo
     */
    private function setDevice($deviceInfo)
    {
        $this->device = Devices::find($deviceInfo['id']);
        if(!$this->device){
            $this->setIsNewDevice();
            $this->device = Devices::create([
                'id' => $deviceInfo['id']
            ]);
        }
    }

    /**
     * @param int $device_id
     * @param int $user_id
     * @return null
     */
    public static function setDeviceToUser(int $device_id, int $user_id)
    {
        $device = Devices::find($device_id);
        if($device){
            $device->user_id = $user_id;
            $device->save();

            return $device;
        }

        return null;
    }

    /**
     * DeviceController constructor.
     * @param $deviceInfo
     */
    public function __construct($deviceInfo)
    {
        $this->setDevice($deviceInfo);
        return $this;
    }

    private function setUserId()
    {
        if($this->device){
            $this->device->user_id = Auth::id();
        }
    }
    private function setIsNewDevice()
    {
        $this->isNewDevice = true;
    }
}
