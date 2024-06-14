document.addEventListener('DOMContentLoaded', function () {
    const provinceSelect = document.querySelector('#province');
    const citySelect = document.querySelector('#city');
    const districtSelect = document.querySelector('#district');
    const villageSelect = document.querySelector('#village');

    const getProvince = async () => {
        try {
            const response = await fetch('/api/province');
            const data = await response.json();
            populateProvinceSelect(data);
        } catch (error) {
            console.error('Error fetching province data:', error);
        }
    }

    const populateProvinceSelect = (data) => {
        provinceSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
        data.forEach(province => {
            const option = document.createElement('option');
            option.value = province.id;
            option.textContent = province.name;
            provinceSelect.appendChild(option);
        });
    }
    getProvince();


    const getCity = async (id) => {
        try {
            const response = await fetch(`/api/city/province/${id}`);
            const data = await response.json();
            populateCitySelect(data);
        } catch (error) {
            console.error('Error fetching province data:', error);
        }
    }
    const populateCitySelect = (data) => {
        citySelect.innerHTML = '<option value="">Pilih Kota</option>';
        data.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id;
            option.textContent = city.name;
            citySelect.appendChild(option);
        });
    }
    const getDistrict = async (id) => {
        try {
            const response = await fetch(`/api/district/city/${id}`);
            const data = await response.json();
            populateDistrictSelect(data);
        } catch (error) {
            console.error('Error fetching province data:', error);
        }
    }
    const populateDistrictSelect = (data) => {
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        data.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id;
            option.textContent = city.name;
            districtSelect.appendChild(option);
        });
    }
    const getVillage = async (id) => {
        try {
            const response = await fetch(`/api/village/district/${id}`);
            const data = await response.json();
            populateVillageSelect(data);
        } catch (error) {
            console.error('Error fetching province data:', error);
        }
    }
    const populateVillageSelect = (data) => {
        villageSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
        data.forEach(city => {
            const option = document.createElement('option');
            option.value = city.id;
            option.textContent = city.name;
            villageSelect.appendChild(option);
        });
    }


    document.querySelector('#province').addEventListener('change', function () {
        getCity(provinceSelect.value);
    });
    document.querySelector('#city').addEventListener('change', function () {
        getDistrict(citySelect.value);
    });
    document.querySelector('#district').addEventListener('change', function () {
        getVillage(districtSelect.value);
    });
});