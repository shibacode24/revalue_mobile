<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicePoint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServicePointsController extends Controller
{
    public function index()
    {
        $servicePoints = ServicePoint::all();
        return view('service_points.index', ['servicePoints' => $servicePoints]);
    }

    public function create()
    {
        return view('service_points.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'State' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'Location_Name' => 'required|string|max:255',
            'Contact_Person' => 'required|string|max:255',
            'Mobile_No1' => 'required|string|max:15',
            'Mobile_No2' => 'required|string|max:15',
            'Address_Pin_Code' => 'required|string|max:10',
            'Status' => 'required|string|max:255',
        ]);

        // Create a new service point record
        $servicePoint = new ServicePoint($validatedData);
        $servicePoint->save();

        return redirect()->route('service-points.index')->with('success', 'Service Point created successfully');
    }

    public function edit($id)
    {
        $servicePoint = ServicePoint::findOrFail($id);
        return view('service_points.edit', ['servicePoint' => $servicePoint]);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'State' => 'required|string|max:255',
            'City' => 'required|string|max:255',
            'Location_Name' => 'required|string|max:255',
            'Contact_Person' => 'required|string|max:255',
            'Mobile_No1' => 'required|string|max:15',
            'Mobile_No2' => 'required|string|max:15',
            'Address_Pin_Code' => 'required|string|max:10',
            'Status' => 'required|string|max:255',
        ]);

        // Find the service point record by ID
        $servicePoint = ServicePoint::findOrFail($id);

        // Update the service point record
        $servicePoint->update($validatedData);

        return redirect()->route('service-points.index')->with('success', 'Service Point updated successfully');
    }

    public function destroy($id)
    {
        // Find the service point record by ID and delete it
        $servicePoint = ServicePoint::findOrFail($id);
        $servicePoint->delete();

        return redirect()->route('service-points.index')->with('success', 'Service Point deleted successfully');
    }
	   public function mobile_modules_table_backup() //csv format
{
    try {
        // Specify the tables and columns you want to export
        $tableName = 'mobile__modules';
        $brandTable = 'mobile_type';
        $targetTable = 'mobile_seriesid_mobile_module';
        $columns = [
            "$targetTable.id",
            "$brandTable.mobile_brand",
            "$tableName.add_mobile_module",
            "$targetTable.ram",
            "$targetTable.storage",
            "$targetTable.price",
            
        ];

        // Generate CREATE TABLE statement
        $createTable = DB::selectOne("SHOW CREATE TABLE $tableName")->{'Create Table'};
        $backupSQL = "DROP TABLE IF EXISTS `$tableName`;\n";
        $backupSQL .= "$createTable;\n";

        // Retrieve and export data for the specified columns from the joined tables
        $tableData = DB::table($tableName)
            ->select($columns)
            // ->join($targetTable, $tableName . '.id', '=', $targetTable . '.mobile_module_id')
            // ->join($tableName, $brandTable . '.id', '=', $tableName . '.select_mobile_brand_id')
            ->join($targetTable, "$tableName.id", '=', "$targetTable.mobile_module_id")
            ->join($brandTable, "$tableName.select_mobile_brand_id", '=', "$brandTable.id")
            ->get();

        // Debugging output
        // dd($tableData);

        if ($tableData->isEmpty()) {
            // Handle the case where no data is retrieved
            return redirect()->route('home')->with('error', 'No data retrieved from the joined tables.');
        } else {
            // Convert data to CSV format
            $csvData = implode(',', $columns) . "\n";
            foreach ($tableData as $row) {
                $values = [];
                foreach ($columns as $column) {
                    $columnParts = explode('.', $column);
                    $actualColumn = end($columnParts);
                    $values[] = $row->{$actualColumn};
                }
                $csvData .= implode(',', $values) . "\n";
            }

            // Save the CSV file
            $csvFileName = 'backup-' . now()->format('Y-m-d-His') . '.csv';
            Storage::disk('local')->put($csvFileName, $csvData);

            // Download the CSV file
            return response()->download(
                storage_path('app/' . $csvFileName),
                $csvFileName,
                ['Content-Type' => 'text/csv']
            )->deleteFileAfterSend(true);
        }
    } catch (\Exception $e) {
        return redirect()->route('mobile_series')->with('error', 'Database backup creation and download failed: ' . $e->getMessage());
    }
}


public function updateMobileModuleDataFromCSV(Request $request)
{
    try {
         //dd($request->file);
        // Read the CSV file
        if (!$request->hasFile('file')) {
            return redirect()->route('mobile_series')->with('error', 'CSV file not found in the request.');
        }

        // Get the file from the request
        $csvFile = $request->file('file');

        // Check if the file is valid
        if (!$csvFile->isValid()) {
            return redirect()->route('mobile_series')->with('error', 'Invalid CSV file.');
        }

        // Read the CSV file
        $csvContent = file_get_contents($csvFile->path());
        $lines = explode("\n", $csvContent);

        // Process each line
        foreach ($lines as $line) {
            // Skip empty lines
            if (empty($line)) {
                continue;
            }

            // Parse CSV line
            $data = str_getcsv($line);
            // Extract values
            $id = $data[0];
            $MobileBrand = $data[1];
            $addMobileModule = $data[2];
            $ram = $data[3];
            $storage = $data[4];
            $price = $data[5];
// echo json_encode($id);
// exit();
            // Update the database
            DB::table('mobile_seriesid_mobile_module')
            ->where('id', $id)
            ->update([
                'price' => $price,
            ]);
        }

        // Optionally, you can add a success message
        return redirect()->route('mobile_series')->with('success', 'Data updated successfully.');
    } catch (\Exception $e) {
        // Handle exceptions
        return redirect()->route('mobile_series')->with('error', 'Database update failed: ' . $e->getMessage());
    }
}

	public function database_backup(){
        try {
            $tables = DB::select('SHOW TABLES');
            $backupSQL = '';
            foreach ($tables as $table) {
                $tableName = reset($table);
                $createTable = DB::selectOne("SHOW CREATE TABLE $tableName")->{'Create Table'};
                $backupSQL .= "DROP TABLE IF EXISTS `$tableName`;\n";
                $backupSQL .= "$createTable;\n";
                $tableData = DB::table($tableName)->get();
                foreach ($tableData as $row) {
                    $values = [];
                    foreach ($row as $value) {
                        $values[] = '"' . addslashes($value) . '"';
                    }
                    $backupSQL .= "INSERT INTO `$tableName` VALUES (" . implode(', ', $values) . ");\n";
                }
                $backupSQL .= "\n";
            }
            $backupFileName = 'backup-' . now()->format('Y-m-d-His') . '.sql';
           Storage::disk('local')->put($backupFileName, $backupSQL);
            return response()->download(
                storage_path('app/' . $backupFileName),
                $backupFileName,
                ['Content-Type: application/sql']
            )->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Database backup creation and download failed: ' . $e->getMessage());
        }
    }
}
