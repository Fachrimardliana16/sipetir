<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PegawaiResource\Pages;
use App\Filament\Resources\PegawaiResource\RelationManagers;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Unique;


class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Biodata Pegawai')
                ->description('Biodata Pegawai')
                ->collapsible()
                ->schema([
                    TextInput::make('nip')
                    ->unique()
                    ->label('NIPPAM')
                    ->maxLength('20')
                    ->required(),
                    TextInput::make('nama_pegawai')
                    ->label('Nama Pegawai')
                    ->maxLength('100')
                    ->required(),
                    TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->required(),
                    DatePicker::make('tanggal_lahir')
                    ->native(false)
                    ->required(),
                    TextInput::make('usia')
                    ->disabled()
                    ->required(),
                    Select::make('jenis_kelamin')->options([
                    'laki-laki' => 'Laki - Laki',
                    'perempuan' => 'Perempuan'
                    ])->required(),
                    Select::make('agama')->options([
                    'islam' => 'Islam',
                    'kriten' => 'Kristen',
                    'katholik' => 'Katholik',
                    'budha' => 'Budha',
                    'hindu' => 'Hindu',
                    'kepercayaan' => 'Kepercayaan',
                    ])->required(),
                    TextInput::make('alamat')->required(),
                    Select::make('gol_darah')->options([
                    'a' => 'A',
                    'b' => 'B',
                    'ab' => 'AB',
                    'ao' => 'O',
                    ])->label('Golongan Darah')->required(),
                    Select::make('status_nikah')->options([
                    'belum menikah' => 'Belum Menikah',
                    'sudah menikah' => 'Sudah Menikah',
                    'cerai' => 'Cerai',
                    ])->required(),
                ])->columns(3),
                
                Section::make('Data Nomor Penting')
                ->description('Data Nomor Penting Pegawai')
                ->collapsible()
                ->schema([
                    TextInput::make('no_ktp')
                    ->numeric()
                    ->required(),
                    TextInput::make('no_kk')
                    ->numeric()
                    ->required(),
                    TextInput::make('no_tlp')
                    ->numeric()
                    ->maxLength(13)
                    ->required(),
                    TextInput::make('no_bpjs_kes')
                    ->numeric()
                    ->required(),
                    TextInput::make('no_bpjs_tk')
                    ->numeric()
                    ->required(),
                    TextInput::make('no_rekening')
                    ->numeric()
                    ->required(),
                    TextInput::make('rek_dplk_pribadi')
                    ->numeric()
                    ->required(),
                    TextInput::make('rek_dplk_bersama')
                    ->numeric()
                    ->required(),
                    TextInput::make('no_npwp')
                    ->numeric()
                    ->required(),
                ])->columns(5),

                Section::make('Data Kepegawaian')
                ->description('Data Kepegawaian')
                ->collapsible()
                ->schema([
                    Select::make('status_pegawai')->options([
                    'thl' => 'Tenaga Harian Lepas',
                    'kontrak' => 'Kontrak',
                    'honor tetap' => 'Honor Tetap',
                    'calon pegawai' => 'Calon Pegawai',
                    'pegawai' => 'Pegawai',
                    'pensiun' => 'Pensiun',
                    ]),
                    TextInput::make('tanggal_masuk')->required(),
                    TextInput::make('tanggal_pengangkatan_cpns')->required(),
                    TextInput::make('id_golongan')->required(),
                    TextInput::make('id_jabatan')->required(),
                    TextInput::make('id_status_jabatan')->required(),
                    TextInput::make('nomor_sk_jabatan')->required(),
                    TextInput::make('tanggal_sk_jabatan')->required(),
                    TextInput::make('tanggal_selesai_jabatan')->required(),
                    TextInput::make('id_unit_kerja')->required(),
                    TextInput::make('id_satuan_kerja')->required(),
                    TextInput::make('lokasi_kerja')->required(),
                    TextInput::make('status_pegawai_pangkat')->required(),
                    TextInput::make('nomor_sk_pangkat')->required(),
                    TextInput::make('tanggal_sk_pangkat')->required(),
                    TextInput::make('tanggal_mulai_pangkat')->required(),
                    TextInput::make('tanggal_selesai_pangkat')->required(),
                    TextInput::make('id_eselon')->required(),
                    TextInput::make('tmt_eselon')->required(),
                ])->columns(3),
              
                Section::make('Data Berkas Lamaran Pegawai')
                ->description('Upload Berkas Lamaran Pegawai')
                ->collapsible()
                ->schema([
                     FileUpload::make('berkas_lamaran')->disk('public')->directory('berkas')
                ])->columns(1),
            
                 Section::make('Data User Pegawai')
                 ->description('Data User Pegawai')
                 ->collapsible()
                 ->schema([
                    TextInput::make('username')->required(),
                    TextInput::make('email')->email()->required(),
                    TextInput::make('password')->password()->required()->required(),
                    TextInput::make('foto'),
                    
                ])->columns(2)

            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 TextColumn::make('nip') 
                 ->sortable()
                 ->searchable(),
                 TextColumn::make('nama_pegawai')
                  ->sortable()
                  ->searchable(),
                 TextColumn::make('tempat_lahir')
                  ->sortable()
                  ->searchable(),
                 TextColumn::make('tanggal_lahir')
                 ->date()
                  ->sortable()
                  ->searchable(),
                 TextColumn::make('jenis_kelamin')
                  ->sortable()
                  ->searchable(),
                 TextColumn::make('agama')
                  ->sortable()
                  ->searchable(),
                 TextColumn::make('usia')
                  ->sortable()
                  ->searchable(),
                  TextColumn::make('alamat')
                  ->sortable()
                  ->searchable(),
                  TextColumn::make('gol_darah')
                  ->sortable()
                  ->searchable(),
                  TextColumn::make('status_nikah')
                  ->sortable()
                  ->searchable(),
            ])->defaultSort('nama_pegawai')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
