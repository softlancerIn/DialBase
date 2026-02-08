<?php

namespace App\Helpers;

class StateData
{
    public static function get(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Andhra-Pradesh',
                'cities' => ['Visakhapatnam', 'Vijayawada', 'Hyderabad', 'Nellore', 'Tirupati', 'Rajahmundry', 'Guntur', 'Kadapa', 'Warangal', 'Khammam', 'Kurnool', 'Anantapur']
            ],
            [
                'id' => 2,
                'name' => 'Arunachal-Pradesh',
                'cities' => ['Itanagar', 'Naharlagun', 'Pasighat', 'Tezu', 'Roing', 'Bomdila', 'Changlang', 'Tawang']
            ],
            [
                'id' => 3,
                'name' => 'Assam',
                'cities' => ['Guwahati', 'Silchar', 'Dibrugarh', 'Nagaon', 'Barpeta', 'Bongaigaon', 'Tinsukia', 'Jorhat', 'Golaghat', 'Sibsagar', 'Kamrup', 'Dhubri']
            ],
            [
                'id' => 4,
                'name' => 'Bihar',
                'cities' => ['Patna', 'Gaya', 'Bhagalpur', 'Muzaffarpur', 'Darbhanga', 'Purnia', 'Munger', 'Saharsa', 'Sitamarhi', 'Madhubani', 'Khagaria', 'Begusarai']
            ],
            [
                'id' => 5,
                'name' => 'Chhattisgarh',
                'cities' => ['Raipur', 'Bilaspur', 'Durg', 'Rajnandgaon', 'Raigarh', 'Jagdalpur', 'Dhamtari', 'Mandir', 'Kanker', 'Korba']
            ],
            [
                'id' => 6,
                'name' => 'Goa',
                'cities' => ['Panaji', 'Margao', 'Vasco-da-Gama', 'Pernem', 'Ponda', 'Sattari', 'Bicholim', 'Sanquelim', 'Curchorem', 'Quepem']
            ],
            [
                'id' => 7,
                'name' => 'Gujarat',
                'cities' => ['Ahmedabad', 'Surat', 'Vadodara', 'Rajkot', 'Jamnagar', 'Junagadh', 'Bhavnagar', 'Mehsana', 'Patan', 'Anand', 'Nadiad', 'Godhra', 'Visnagar', 'Palanpur']
            ],
            [
                'id' => 8,
                'name' => 'Haryana',
                'cities' => ['Faridabad', 'Gurgaon', 'Hisar', 'Rohtak', 'Panipat', 'Ambala', 'Yamunanagar', 'Karnal', 'Kaithal', 'Rewari', 'Sonepat']
            ],
            [
                'id' => 9,
                'name' => 'Himachal-Pradesh',
                'cities' => ['Shimla', 'Solan', 'Mandi', 'Kangra', 'Kullu', 'Chamba', 'Bilaspur', 'Palampur', 'Dharamshala', 'Baddi', 'Kinnaur']
            ],
            [
                'id' => 10,
                'name' => 'Jharkhand',
                'cities' => ['Ranchi', 'Dhanbad', 'Giridih', 'Jamshedpur', 'Bokaro', 'Dumka', 'Hazaribagh', 'Godda', 'Deoghar', 'Ramgarh', 'Deogarh']
            ],
            [
                'id' => 11,
                'name' => 'Karnataka',
                'cities' => ['Bangalore', 'Mysore', 'Hubballi', 'Belgaum', 'Belagavi', 'Mangalore', 'Tumkur', 'Kolar', 'Shimoga', 'Chickmagalur', 'Davangere', 'Raichur', 'Bijapur', 'Belgaum', 'Hassan', 'Udupi']
            ],
            [
                'id' => 12,
                'name' => 'Kerala',
                'cities' => ['Thiruvananthapuram', 'Kochi', 'Kozhikode', 'Thrissur', 'Alappuzha', 'Kottayam', 'Pathanamthitta', 'Kannur', 'Kasaragod', 'Malappuram', 'Palakkad']
            ],
            [
                'id' => 13,
                'name' => 'Madhya-Pradesh',
                'cities' => ['Indore', 'Bhopal', 'Jabalpur', 'Gwalior', 'Ujjain', 'Sager', 'Rewa', 'Khandwa', 'Khimti', 'Burhanpur', 'Dewas', 'Itarsi', 'Dhar', 'Betul', 'Chhindwara']
            ],
            [
                'id' => 14,
                'name' => 'Maharashtra',
                'cities' => ['Mumbai', 'Pune', 'Nagpur', 'Ahmedabad', 'Thane', 'Amanora-Park-Town', 'Kolhapur', 'Nashik', 'Aurangabad', 'Solapur', 'Latur', 'Sangli', 'Nandurbar', 'Jalgaon', 'Parbhani', 'Buldhana', 'Yavatmal', 'Amravati', 'Chandrapur', 'Akola', 'Washim', 'Gondia']
            ],
            [
                'id' => 15,
                'name' => 'Manipur',
                'cities' => ['Imphal', 'Thoubal', 'Bishnupur', 'Senapati', 'Tamenglong', 'Jiribam', 'Kakching', 'Chandel']
            ],
            [
                'id' => 16,
                'name' => 'Meghalaya',
                'cities' => ['Shillong', 'Tura', 'Nongpoh', 'Jowai', 'Cherrapunji', 'Mawkyrwat', 'Baghmara', 'Williamnagar']
            ],
            [
                'id' => 17,
                'name' => 'Mizoram',
                'cities' => ['Aizawl', 'Lunglei', 'Saiha', 'Sichar', 'Serchhip', 'Champhai', 'Kolasib', 'Mamit']
            ],
            [
                'id' => 18,
                'name' => 'Nagaland',
                'cities' => ['Kohima', 'Dimapur', 'Wokha', 'Mokokchung', 'Tuensang', 'Zunheboto', 'Longleng', 'Kiphire', 'Mon', 'Peren']
            ],
            [
                'id' => 19,
                'name' => 'Odisha',
                'cities' => ['Bhubaneswar', 'Cuttack', 'Rourkela', 'Berhampur', 'Sambalpur', 'Balasore', 'Angul', 'Bargarh', 'Dhenkanal', 'Jajpur', 'Kalahandi', 'Kandhamal', 'Khordha', 'Mayurbhanj', 'Nayagarh', 'Nuapada', 'Subarnapur', 'Sundargarh']
            ],
            [
                'id' => 20,
                'name' => 'Punjab',
                'cities' => ['Amritsar', 'Ludhiana', 'Chandigarh', 'Patiala', 'Jalandhar', 'Bathinda', 'Hoshiarpur', 'Mansa', 'Firozpur', 'Gurdaspur', 'Sangrur', 'Kapurthala', 'Faridkot', 'Muktsar']
            ],
            [
                'id' => 21,
                'name' => 'Rajasthan',
                'cities' => ['Jaipur', 'Jodhpur', 'Kota', 'Bikaner', 'Ajmer', 'Udaipur', 'Alwar', 'Bhilwara', 'Sikar', 'Pali', 'Barmer', 'Sirohi', 'Nagaur', 'Hanumangarh', 'Ganganagar', 'Banswara', 'Dungarpur', 'Rajsamand', 'Chittorgarh']
            ],
            [
                'id' => 22,
                'name' => 'Sikkim',
                'cities' => ['Gangtok', 'Namchi', 'Geyzing', 'Mangan', 'Jorethang']
            ],
            [
                'id' => 23,
                'name' => 'Tamil-Nadu',
                'cities' => ['Chennai', 'Coimbatore', 'Madurai', 'Salem', 'Tiruchirappalli', 'Tirunelveli', 'Erode', 'Tirupur', 'Kanchipuram', 'Cuddalore', 'Villupuram', 'Ranipet', 'Tiruvannamalai', 'Nandyal', 'Chengalpattu', 'Perambalur', 'Pudukkottai', 'Sivaganga', 'Ramanathapuram']
            ],
            [
                'id' => 24,
                'name' => 'Telangana',
                'cities' => ['Hyderabad', 'Secunderabad', 'Warangal', 'Karimnagar', 'Nizamabad', 'Ramagundam', 'Mahbubnagar', 'Suryapet', 'Miryalaguda', 'Khammam', 'Hanamkonda']
            ],
            [
                'id' => 25,
                'name' => 'Tripura',
                'cities' => ['Agartala', 'Udaipur', 'Dharmanagar', 'Suryamaninagar', 'Ambassa', 'Kailasahar', 'Sabroom', 'Khowai']
            ],
            [
                'id' => 26,
                'name' => 'Uttar-Pradesh',
                'cities' => ['Lucknow', 'Kanpur', 'Ghaziabad', 'Agra', 'Varanasi', 'Meerut', 'Mirzapur', 'Allahabad', 'Bareilly', 'Bhadohi', 'Noida', 'Greater-Noida', 'Aligarh', 'Saharanpur', 'Mathura', 'Firozabad', 'Rampur', 'Moradabad', 'Azamgarh', 'Gorakhpur', 'Jhansi', 'Gwalior', 'Sultanpur', 'Banda', 'Fatehpur', 'Hardoi', 'Lucknow', 'Badaun', 'Bulandshahr', 'Etah']
            ],
            [
                'id' => 27,
                'name' => 'Uttarakhand',
                'cities' => ['Dehradun', 'Roorkee', 'Haridwar', 'Nainital', 'Almora', 'Bageshwar', 'Chamoli', 'Champawat', 'Pauri', 'Pithoragarh', 'Rudraprayag', 'Tehri', 'Udham-Singh-Nagar', 'Uttarkashi']
            ],
            [
                'id' => 28,
                'name' => 'West-Bengal',
                'cities' => ['Kolkata', 'Howrah', 'Durgapur', 'Asansol', 'Siliguri', 'Belgaum', 'Kharagpur', 'Midnapore', 'Jalpaiguri', 'Malda', 'Cooch-Behar', 'Darjeeling', 'Kalimpong', 'Alipurduar', 'Nadia', 'Birbhum', 'Bankura']
            ],
            [
                'id' => 29,
                'name' => 'Delhi',
                'cities' => ['New-Delhi', 'Central-Delhi', 'East-Delhi', 'South-Delhi', 'West-Delhi', 'North-Delhi']
            ],
            [
                'id' => 30,
                'name' => 'Puducherry',
                'cities' => ['Puducherry', 'Yanam', 'Karaikal', 'Mahe']
            ],
            [
                'id' => 31,
                'name' => 'Ladakh',
                'cities' => ['Leh', 'Kargil']
            ],
            [
                'id' => 32,
                'name' => 'Jammu-and-Kashmir',
                'cities' => ['Srinagar', 'Jammu', 'Leh', 'Kargil', 'Anantnag', 'Baramulla', 'Kupwara', 'Ganderbal', 'Budgam', 'Kulgam', 'Pulwama', 'Shopian', 'Samba', 'Kathua', 'Doda', 'Kishtwar', 'Ramban', 'Reasi', 'Poonch', 'Rajouri']
            ],
            [
                'id' => 33,
                'name' => 'Andaman-and-Nicobar-Islands',
                'cities' => ['Port-Blair', 'Andaman', 'Nicobar']
            ],
            [
                'id' => 34,
                'name' => 'Chandigarh',
                'cities' => ['Chandigarh']
            ],
            [
                'id' => 35,
                'name' => 'Dadar-and-Nagar-Haveli-and-Daman-and-Diu',
                'cities' => ['Daman', 'Diu', 'Silvassa']
            ],
            [
                'id' => 36,
                'name' => 'Lakshadweep',
                'cities' => ['Kavaratti', 'Agatti', 'Amini', 'Androth', 'Kalpeni', 'Kiltan', 'Minicoy']
            ]
        ];
    }
}
