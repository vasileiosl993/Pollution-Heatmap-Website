# Pollution-Heatmap-Website

Web API management system

The system administrator, after successfully connecting to the system, has the ability to add / remove an air pollution recording station. The administrator also has the ability to enter data into the system database, uploading the corresponding csv data file (from the ministry dataset). In the above way the administrator has the ability to enrich the system database and consequently the amount of data that the API will return.
The web API responds to the following requests:
1) Recording stations: The web API returns all available stations created in the system (station code, name, geographical coordinates).
2) Absolute pollution value: The web API accepts as input the type of pollutant, the recording station code, the date and time and returns the geographical coordinates of the recording station and the absolute pollution value for the requested pollutant.
3) Average pollution value: The web API accepts as input the type of pollutant, the recording station code and a time period and returns the mean value of the pollutant and the standard deviation for the requested time period, as well as the geographical coordinates of the respective recording station.
Finally, in order for a third party developer to use the web API, they must register in the system (email and password) and then request a unique API key. The system automatically assigns to each programmer the unique API key and at the same time records the number and type of requests for each API key. The statistics section of the page is automatically updated using AJAX.

Creating a demo web site using the web API

The web site displays a map (using Google Maps) on which the visitor can select the information they want to display. The visitor can choose to display the data of a specific recording station, for a specific day and time or for a specific period of time. On the map each recording station is presented as a marker. Finally, the presentation of the data on the map is done as a heat map.

The database was implemented in mysql.
